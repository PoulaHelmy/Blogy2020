<?php

namespace App\Http\Middleware;

use App\Models\Playlist;
use Closure;

class CheckBeforeDeletePlaylist
{

    public function handle($request, Closure $next)
    {
        $id=$request->segment(3);
        $play=Playlist::find($id);
        $count=($play->posts->count())+($play->videos->count());

        if($count>0){
            session()->flash('error','Could Not Delete This PlayList Because it has An Items Related By it');
            return redirect(route('playlists.index'));
        }
        return $next($request);
    }
}
