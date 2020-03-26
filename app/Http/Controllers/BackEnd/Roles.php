<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Role;
use Illuminate\Http\Request;

class Roles extends BackEndController
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
        //create read update delete
//        $this->middleware(['permission:read_roles'])->only('index');
//        $this->middleware(['permission:create_roles'])->only('create');
//        $this->middleware(['permission:update_roles'])->only('edit');
//        $this->middleware(['permission:delete_roles'])->only('destroy');
    }//end of constructor

    protected function append()
    {
        $array =  [
            'roles' => Role::get(),
        ];
        return $array;
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->all();


        $role = role::create($request_data);
        $role->syncPermissions($request->permissions);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('roles.index');
    }//end of store



    public function update(Request $request, role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->all();


        $role->update($request_data);

        $role->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('roles.index');
    }//end of update
}//end of controller
