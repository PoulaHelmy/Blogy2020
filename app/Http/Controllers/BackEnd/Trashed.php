<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;

class Trashed extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function videosindex()
    {
        return view('back-end.trashed.videosIndex');
    }
}
