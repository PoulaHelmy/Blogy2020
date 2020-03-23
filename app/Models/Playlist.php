<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Playlist extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
        'cat_id',
        'user_id',
        'level',
        'des' ,
        'meta_des' ,
        'meta_keywords' ,
        'published'

    ];

}
