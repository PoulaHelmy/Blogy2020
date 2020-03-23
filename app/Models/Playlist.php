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
    public function comments()
    {
        return $this->morphMany(\App\Models\Comments::class, 'commentable');
    }

    public function photos(){
        return $this->morphOne(\App\Models\Photo::class,'photoable');
    }
    public function tags()
    {
        return $this->morphToMany(\App\Models\Tag::class, 'taggable');
    }
    public function skills()
    {
        return $this->morphToMany(\App\Models\Skill::class, 'skillable');
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class , 'user_id');
    }

    public function cat(){
        return $this->belongsTo(\App\Models\Category::class , 'cat_id');
    }
    public function posts()
    {
        return $this->morphToMany(\App\Models\Post::class, 'playlistable');
    }
    public function videos()
    {
        return $this->morphToMany(\App\Models\Post::class, 'playlistable');
    }
}
