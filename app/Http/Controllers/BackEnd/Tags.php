<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Tags\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('tags.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $row->update($request->all());

        return redirect()->route('tags.edit' , [ $row->id]);
    }
}
