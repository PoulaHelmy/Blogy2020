<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Skills\Store;
use App\Models\Skill;
use Illuminate\Http\Request;

class Skills extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
        $this->middleware(['CheckBeforeDeleteSkill'])->only('destroy');

    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('skills.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $row->update($request->all());

        return redirect()->route('skills.edit' , [ $row->id]);
    }
}
