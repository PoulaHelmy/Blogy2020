<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name' , 'meta_keywords' , 'meta_des'
    ];
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
    public function vedios()
    {
        return $this->belongsTo(Video::class);
    }
    public function playlists()
    {
        return $this->belongsTo(Playlist::class);
    }
}
