<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Category;
use Illuminate\Http\Request;

class Categories extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(\App\Http\Requests\BackEnd\Categoires\Store $request){
        $this->model->create($request->all());

        return redirect()->route('categories.index');
    }

    public function update($id , \App\Http\Requests\BackEnd\Categoires\Store $request){
        $row = $this->model->FindOrFail($id);
        $row->update($request->all());

        return redirect()->route('categories.index');
    }
}
