<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name' , 'meta_keywords' , 'meta_des'
    ];
    public function posts()
    {
        return $this->belongsTo(\App\Models\Post::class);
    }
    public function vedios()
    {
        return $this->belongsTo(\App\Models\Video::class);
    }
    public function playlists()
    {
        return $this->belongsTo(\App\Models\Playlist::class);
    }
}
