<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{use SoftDeletes;
    protected $fillable=[
        'name',
        'des',
        'content',
        'cat_id',
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
    public function cat(){
        return $this->belongsTo(Category::class,'cat_id');
    }
//    public function tags() {
//        return $this->belongsToMany(Tag::class,'tags_posts');
//    }
//    public function skills() {
//        return $this->belongsToMany(Skill::class,'skills_posts');
//    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function hasTag($tagid){
        return in_array($tagid,$this->tags->pluck('id')->toArray());
    }
}
