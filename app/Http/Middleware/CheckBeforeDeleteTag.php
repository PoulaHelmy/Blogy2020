<?php

namespace App\Http\Middleware;

use App\Models\Tag;
use Closure;

class CheckBeforeDeleteTag
{
    public function handle($request, Closure $next)
    {
        $id=$request->segment(3);
        $tag=Tag::find($id);
        $count=($tag->playlists->count())+($tag->videos->count())+($tag->posts->count());
        if ($count>0) {
            session()->flash('error', 'Could Not Delete This Tag Because it has An Items Related By it');
            return redirect(route('tags.index'));
        }
        return $next($request);
    }
}
