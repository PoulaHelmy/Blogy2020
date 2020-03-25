<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name' , 'meta_keywords' , 'meta_des'
    ];
    public function videos()
    {
        return $this->morphedByMany(\App\Models\Video::class, 'categorable');
    }
    public function posts()
    {
        return $this->morphedByMany(\App\Models\Post::class, 'categorable');
    }
    public function playlists()
    {
        return $this->morphedByMany(\App\Models\Playlist::class, 'categorable');
    }
}
