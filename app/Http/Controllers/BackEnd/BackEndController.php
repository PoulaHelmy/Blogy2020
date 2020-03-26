<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BackEndController extends Controller
{
    protected $model;

    protected $moduleName;

    protected $pageTitle;

    protected $pageDes;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
//        $rows = $this->model;
//        $rows = $this->filter($rows);
//        $with = $this->with();
//
//        if(!empty($with)){
//            $rows = $rows->with($with);
//        }
        $rows = $this->model::when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->search.'%');
        })->latest()->paginate(10);

        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $folderName = $this->getClassNameFromModel();
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
    public function show($row)
    {
        $moduleName = $this->getModelName();
        $pageTitle = "Show ". $moduleName;
        $pageDes = "Here you can Show " .$moduleName;
        $sModuleName = $this->getModelName();
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $row=$this->model->findOrFail($row);
        return view('back-end.' . $folderName . '.show', compact(
            'row',
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName',
            'sModuleName'
        ));
    }
    public function create()
    {
        $moduleName = $this->getModelName();
        $pageTitle = "Create ". $moduleName;
        $pageDes = "Here you can create " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('back-end.' . $folderName . '.create', compact(
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName'
        ))->with($append);
    }


    public function edit($id)
    {
        $row = $this->model->FindOrFail($id);
        $moduleName = $this->getModelName();
        $pageTitle = "Edit " . $moduleName;
        $pageDes = "Here you can edit " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();
        return view('back-end.' . $folderName . '.edit', compact(
            'row',
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName'
        ))->with($append);
    }

    protected function filter($rows)
    {
        return $rows;
    }

    protected function with()
    {
        return [];
    }

    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName()
    {
        return Str::plural($this->getModelName());
    }

    protected function getModelName()
    {
        return class_basename($this->model);
    }

    protected function append()
    {
        return [];
    }

    public function trashedItem(Request $request)
    {
        $rows = $this->model::onlyTrashed()->when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);

        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        return view('back-end.trashed.' . $folderName . 'Index', compact(
            'rows',
            'moduleName',
            'sModuleName',
            'routeName',
            'folderName'
        ));
    }

    public function destroy($id)
    {
        $row=$this->model->findOrFail($id)->delete();
        $rows = $this->model->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $folderName = $this->getClassNameFromModel();
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
    public function destroyTrash($id)
    {
        $row=$this->model::withTrashed()->firstWhere('id', '=', $id);
        foreach ($row->tags as $tag) {
            $tag->pivot->delete();
        }
        foreach ($row->skills as $skill) {
            $skill->pivot->delete();
        }
        foreach ($row->cat as $cc) {
            $cc->pivot->delete();
        }
        if ($this->getModelName()=="Video"||$this->getModelName()=="Post") {
            foreach ($row->playlists as $play) {
                $play->pivot->delete();
            }
        }
        Storage::disk('public')->delete($row->photos->src);
        $row->photos->delete();
        $row->forceDelete();

        $rows = $this->model::onlyTrashed()->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        return view('back-end.trashed.' . $folderName . 'Index', compact(
            'rows',
            'moduleName',
            'sModuleName',
            'routeName',
            'folderName'
        ));
    }

    public function restore($id)
    {
        $row=$this->model::withTrashed()->firstWhere('id', '=', $id)->restore();
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        $rows = $this->model::onlyTrashed()->paginate(10);
        return view('back-end.trashed.' . $folderName . 'Index', compact(
            'rows',
            'moduleName',
            'sModuleName',
            'routeName',
            'folderName'
        ));
    }
}
