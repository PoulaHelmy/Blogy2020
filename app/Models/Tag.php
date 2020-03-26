<?php

namespace App\Models;

use App\Http\Controllers\BackEnd\Posts;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];


    public function posts()
    {
        return $this->morphedByMany(Posts::class, 'taggable');
    }

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
    public function playlists()
    {
        return $this->morphedByMany(Playlist::class, 'taggable');
    }
}
