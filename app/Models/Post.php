<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
        'des',
        'content',
        'user_id'];

    public function photos(){
        return $this->morphOne(\App\Models\Photo::class,'photoable');
    }

    public function comments()
    {
        return $this->morphMany(\App\Models\Comments::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(\App\Models\Tag::class, 'taggable');
    }
    public function skills()
    {
        return $this->morphToMany(\App\Models\Skill::class, 'skillable');
    }
    public function cat()
    {
        return $this->morphToMany(\App\Models\Category::class, 'categorable');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function playlists()
    {
        return $this->morphToMany(\App\Models\Playlist::class, 'playlistable');
    }

}
