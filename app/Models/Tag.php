<?php

namespace App\Models;

use App\Http\Controllers\BackEnd\Posts;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

//    public function videos(){
//        return $this->belongsToMany(Video::class , 'tags_videos');
//    }
    public function posts()
    {
        return $this->morphedByMany(Posts::class, 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
