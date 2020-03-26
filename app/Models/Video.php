<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name' ,
        'des' ,
        'meta_des' ,
        'meta_keywords' ,
        'youtube' ,
        'user_id' ,
        'published'
    ];
    public function comments()
    {
        return $this->morphMany(\App\Models\Comments::class, 'commentable');
    }

    public function photos()
    {
        return $this->morphOne(\App\Models\Photo::class, 'photoable');
    }
    public function tags()
    {
        return $this->morphToMany(\App\Models\Tag::class, 'taggable');
    }
    public function skills()
    {
        return $this->morphToMany(\App\Models\Skill::class, 'skillable');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cat()
    {
        return $this->morphToMany(\App\Models\Category::class, 'categorable');
    }
    public function playlists()
    {
        return $this->morphToMany(\App\Models\Playlist::class, 'playlistable');
    }

    public function scopePublished()
    {
        return $this->where('published', 1);
    }
}
