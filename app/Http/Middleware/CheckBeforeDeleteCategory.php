<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class CheckBeforeDeleteCategory
{

    public function handle( $request, Closure $next)
    {
        $id=$request->segment(3);
        $cat=Category::find($id);
        $count=($cat->playlists->count())+($cat->videos->count())+($cat->posts->count());
        if($count>0){
            session()->flash('error','Could Not Delete This Category Because it has An Items Related By it');
            return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
