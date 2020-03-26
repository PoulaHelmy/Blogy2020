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
        $this->middleware(['checkCategory','checkSkill','checkTag'])->only('create');
        $this->middleware(['CheckBeforeDeletePlaylist'])->only('destroy');

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
