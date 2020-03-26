<?php

namespace App\Http\Middleware;

use App\Models\Tag;
use Closure;

class CheckTag
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
        $count=Tag::all()->count();
        if ($count==0) {
            session()->flash('error', 'First You Need To Add Some Tag');
            return redirect(route('tags.index'));
        }
        return $next($request);
    }
}
