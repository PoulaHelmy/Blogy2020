<?php

namespace App\Models;

use App\Http\Controllers\BackEnd\Posts;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ["name"];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'skillable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'skillable');
    }
}
