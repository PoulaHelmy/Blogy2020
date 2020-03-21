<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Post;

class Posts extends BackEndController
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

}
