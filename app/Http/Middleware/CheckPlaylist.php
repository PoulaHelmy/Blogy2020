<?php

namespace App\Http\Middleware;

use App\Models\Playlist;
use Closure;

class CheckPlaylist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $count=Playlist::all()->count();
        if ($count==0) {
            session()->flash('error', 'First You Need To Add Some Playlists');
            return redirect(route('playlists.index'));
        }
        return $next($request);
    }
}
