<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\Comments\Store;



class Comments extends BackEndController
{
    public function __construct(\App\Models\Comments $model)
    {
        parent::__construct($model);
    }
    public function store(Store $request)
    {
        $requestArray = $request->all() + ["user_id" => auth()->user()->id];
        \App\Models\Comments::create($requestArray);
        return redirect()->route('videos.edit' , [ $requestArray['commentable_id'] , '#comments']);
    }

    public function delete($id){
        $row  = \App\Models\Comments::findOrFail($id);
        $row->delete();
        return redirect()->route('videos.edit' , [ $row->commentable->id , '#comments']);
    }

    public function update($id , Store $request){
        $row  = \App\Models\Comments::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('videos.edit' , [$row->commentable->id  , '#comments']);
    }
    public function poststore(Store $request)
    {

        $requestArray = $request->all() + ["user_id" => auth()->user()->id];
        \App\Models\Comments::create($requestArray);
        return redirect()->route('posts.edit' , [ $requestArray['commentable_id'] , '#comments']);
    }

    public function postdelete($id){
        $row  = \App\Models\Comments::findOrFail($id);
        $row->delete();
        return redirect()->route('posts.edit' , [ $row->commentable->id , '#comments']);
    }

    public function postupdate($id , Store $request){
        $row  = \App\Models\Comments::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('posts.edit' , [$row->commentable->id  , '#comments']);
    }
}
