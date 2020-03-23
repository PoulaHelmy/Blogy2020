<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\Backend\Videos\Store;
use App\Http\Requests\Backend\Videos\Update;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Playlist;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Videos extends BackEndController
{


    public function __construct(Video $model)
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
            'playlists'=>Playlist::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => [],

        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills']  = $this->model->find(request()->route()->parameter('video'))
                ->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']  = $this->model->find(request()->route()->parameter('video'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments']  = $this->model->find(request()->route()->parameter('video'))
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
        return redirect()->route('videos.index');
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
        return redirect()->route('videos.edit', [ $row->id]);
    }

    protected function syncTagsSkills($row , $requestArray){
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
        $rows=Video::onlyTrashed()->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        return view('back-end.trashed.videosIndex', compact(
            'rows',
            'moduleName',
            'sModuleName',
            'routeName'
        ));
    }

    public function destroyvideo($id){
        $video=Video::withTrashed()->firstWhere('id','=',$id);
        if($video->trashed())
        {
            foreach ($video->tags as $tag) {
                 $tag->pivot->delete();
            }
            foreach ($video->skills as $skill) {
                 $skill->pivot->delete();
            }
            foreach ($video->playlists as $playlist) {
                $playlist->pivot->delete();
            }
            Storage::disk('public')->delete($video->photos->src);
            $video->photos->delete();
            $video->forceDelete();

        }
        else
            $video->delete();
        return $this->trashed();
    }

    public function restorevideo($id){
        $video=Video::withTrashed()->firstWhere('id','=',$id)->restore();
        return $this->trashed();
    }
}
