<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Playlists\Store;
use App\Http\Requests\BackEnd\Playlists\Update;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Playlist;
use App\Models\Skill;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;


class Playlists extends BackEndController
{
    public function __construct(Playlist $model)
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
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => []
        ];
        if(request()->route()->parameter('playlist')){
            $array['selectedSkills']  = $this->model->find(request()->route()->parameter('playlist'))
                ->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']  = $this->model->find(request()->route()->parameter('playlist'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments']  = $this->model->find(request()->route()->parameter('playlist'))
                ->comments()->orderBy('id' , 'desc')->with('user')->get();
        }
        return $array;
    }

    public function store(Store $request)
    {
        $requestArray =  ['user_id' => auth()->user()->id] + $request->all();
        $row = $this->model->create($requestArray);
        $fileName = $this->uploadImage($request,$row->id);
        $this->syncTagsSkills($row , $requestArray);
        return redirect()->route('playlists.index');
    }

    public function update($id, Update $request)
    {
        $requestArray = $request->all();

        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);
        $this->syncTagsSkills($row , $requestArray);
        if($request->hasFile('image'))
        {
            Storage::disk('public')->delete($row->photos->src);
            $photo=\App\Models\Photo::findOrFail($row->photos->id);
            $photo->delete();
            $fileName = $this->uploadImage($request,$row->id);
        }
        return redirect()->route('playlists.edit', [ $row->id]);
    }

    protected function syncTagsSkills($row , $requestArray){
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }

    protected function uploadImage($request,$id)
    {
        $photo=Photo::create([
                'src'=> $request->image->store('images','public'),
                'photoable_type'=> $request->get('photoable_type'),
                'photoable_id'=> $id
            ]
        );
        return $photo;
    }


    public function trashed(){
        $rows=Playlist::onlyTrashed()->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        return view('back-end.trashed.playlistsIndex', compact(
            'rows',
            'moduleName',
            'sModuleName',
            'routeName'
        ));
    }

    public function destroyplaylist($id){
        $playlist=Playlist::withTrashed()->firstWhere('id','=',$id);
        if($playlist->trashed())
        {
            foreach ($playlist->tags as $tag) {
                $tag->pivot->delete();
            }
            foreach ($playlist->skills as $skill) {
                $skill->pivot->delete();
            }
            Storage::disk('public')->delete($playlist->photos->src);
            $playlist->photos->delete();
            $playlist->forceDelete();

        }
        else
            $playlist->delete();
        return $this->trashed();
    }

    public function restoreplaylist($id){
        $playlist=Playlist::withTrashed()->firstWhere('id','=',$id)->restore();
        return $this->trashed();
    }
}
