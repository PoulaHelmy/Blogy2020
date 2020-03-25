<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends BackEndController
{
    public function __construct(User $model)
    {
        $this->middleware(['permission:read_users'])->only(['index']);
        $this->middleware(['permission:create_users'])->only(['create','store']);
        $this->middleware(['permission:update_users'])->only(['update','edit']);
        $this->middleware(['permission:delete_users'])->only(['destroy']);
        parent::__construct($model);
    }

    public function index(Request $request)
    {
        $rows = $this->model::whereRoleIs(['admin'])->when($request->search,function ($query)use($request){
                return $query->where('name','like','%'.$request->search.'%');
        })->paginate(10);
        $moduleName = $this->pluralModelName();
        $folderName = $this->getClassNameFromModel();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $pageTitle = "Control ".$moduleName;
        $pageDes = "Here you can add / edit / delete " .$moduleName;

        return view('back-end.' . $this->getClassNameFromModel() . '.index', compact(
            'rows',
            'pageTitle',
            'moduleName',
            'pageDes',
            'sModuleName',
            'routeName',
            'folderName'
        ));
    }
    public function store(Store $request){
        //dd($request->all());
        $requestArray = $request->except(['permissions']);
        $requestArray['password'] =  Hash::make($requestArray['password']);
        $row=$this->model->create($requestArray);
        $row->attachRole('admin');
        $row->syncPermissions($request->permissions);
        return redirect()->route('users.index');
    }

    public function update($id , Update $request){

        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        $row->update($requestArray);
        $row->syncPermissions($request->permissions);
        return redirect()->route('users.edit' , [$row->id]);
    }

//     index when use search input
//    public function index(Request $request)
//    {
//        $rows = $this->model::whereRoleIs(['admin'])->when($request->search,function ($query)use($request){
//                return $query->where('name','like','%'.$request->search.'%');
//            })->paginate(10);
//
//        $moduleName = $this->pluralModelName();
//        $sModuleName = $this->getModelName();
//        $routeName = $this->getClassNameFromModel();
//        $pageTitle = "Control ".$moduleName;
//        $pageDes = "Here you can add / edit / delete " .$moduleName;
//
//        return view('back-end.' . $this->getClassNameFromModel() . '.index', compact(
//            'rows',
//            'pageTitle',
//            'moduleName',
//            'pageDes',
//            'sModuleName',
//            'routeName'
//        ));
//    }



}
