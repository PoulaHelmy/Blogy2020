<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Posts\Store;
use App\Http\Requests\BackEnd\Posts\Update;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Playlist;
use App\Models\Post;
use App\Models\Skill;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Posts extends BackEndController
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }
    protected function with()
    {
        return ['cat', 'user'];
    }

    protected function append()
    {
        $array =  [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'playlists'=>Playlist::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => []
        ];
        if (request()->route()->parameter('post')) {
            $array['selectedSkills']  = $this->model->find(request()->route()->parameter('post'))
                ->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']  = $this->model->find(request()->route()->parameter('post'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments']  = $this->model->find(request()->route()->parameter('post'))
                ->comments()->orderBy('id', 'desc')->with('user')->get();
        }
        return $array;
    }

    public function store(Store $request)
    {
        $requestArray =  ['user_id' => auth()->user()->id] + $request->all();
        $row = $this->model->create($requestArray);
        $fileName = $this->uploadImage($request, $row->id);
        $this->syncTagsSkills($row, $requestArray);
        return redirect()->route('posts.index');
    }

    public function update($id, Update $request)
    {
        $requestArray = $request->all();
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);
        $this->syncTagsSkills($row, $requestArray);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($row->photos->src);
            $photo=\App\Models\Photo::findOrFail($row->photos->id);
            $photo->delete();
            $fileName = $this->uploadImage($request, $row->id);
        }
        return redirect()->route('posts.edit', [ $row->id]);
    }

    protected function syncTagsSkills($row, $requestArray)
    {
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
        if (isset($requestArray['playlist']) && !empty($requestArray['playlist'])) {
            $row->playlists()->sync($requestArray['playlist']);
        }
    }

    protected function uploadImage($request, $id)
    {
        $photo=Photo::create(
            [
                'src'=> $request->image->store('images', 'public'),
                'photoable_type'=> $request->get('photoable_type'),
                'photoable_id'=> $id
            ]
        );
        return $photo;
    }
    public function trashed()
    {
        $rows=Post::onlyTrashed()->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        return view('back-end.trashed.postsIndex', compact(
            'rows',
            'moduleName',
            'sModuleName',
            'routeName'
        ));
    }

    public function destroypost($id)
    {
        $post=Post::withTrashed()->firstWhere('id', '=', $id);
        if ($post->trashed()) {
            foreach ($post->tags as $tag) {
                $tag->pivot->delete();
            }
            foreach ($post->skills as $skill) {
                $skill->pivot->delete();
            }
            foreach ($post->playlists as $playlist) {
                $playlist->pivot->delete();
            }
            Storage::disk('public')->delete($post->photos->src);
            $post->photos->delete();
            $post->forceDelete();
        } else {
            $post->delete();
        }
        return $this->trashed();
    }

    public function restorepost($id)
    {
        $post=Post::withTrashed()->firstWhere('id', '=', $id)->restore();
        return $this->trashed();
    }
}
