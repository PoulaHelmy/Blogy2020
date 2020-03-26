<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Photos\Store;

class Photos extends BackEndController
{
    public function __construct(\App\Models\Photo $model)
    {
        parent::__construct($model);
    }
    public function store(Store $request)
    {
        $requestArray = $request->all() + ["user_id" => auth()->user()->id];
        \App\Models\Comments::create($requestArray);
        return redirect()->route('videos.edit' , [ $requestArray['commentable_id'] , '#comments']);
    }
    public function delete($id)
    {

        $comment=\App\Models\Comments::findOrFail($id);
        $comment=delete();
        return redirect()->route('videos.edit' , [ $requestArray['commentable_id'] , '#comments']);
    }
}
