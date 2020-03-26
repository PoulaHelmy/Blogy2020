<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class CheckCategory
{
    public function handle($request, Closure $next)
    {
        $count=Category::all()->count();
        if ($count==0) {
            session()->flash('error', 'First You Need To Add Some Categories');
            return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
