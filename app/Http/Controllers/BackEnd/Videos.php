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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Videos extends BackEndController
{


    public function __construct(Video $model)
    {
        parent::__construct($model);
        $this->middleware(['checkCategory','checkSkill','checkTag','checkPlaylist'])->only('create');

    }



    protected function append()
    {
        $array =  [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => [],
            'playlists'=>Playlist::get(),
            'selectedPlaylists'=>[]
        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills']  = $this->model->find(request()->route()->parameter('video'))
                ->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']  = $this->model->find(request()->route()->parameter('video'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments']  = $this->model->find(request()->route()->parameter('video'))
                ->comments()->orderBy('id' , 'desc')->with('user')->get();
            $array['selectedPlaylists']  = $this->model->find(request()->route()->parameter('video'))
                ->playlists()->pluck('playlists.id')->toArray();
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
        if (isset($requestArray['playlists']) && !empty($requestArray['playlists'])) {
            $row->playlists()->sync($requestArray['playlists']);
        }
        if (isset($requestArray['cat_id']) && !empty($requestArray['cat_id'])) {
            $row->cat()->sync($requestArray['cat_id']);
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






}
