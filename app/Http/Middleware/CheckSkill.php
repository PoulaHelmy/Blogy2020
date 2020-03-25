<?php

namespace App\Http\Middleware;
use App\Models\Skill;
use Closure;

class CheckSkill
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
        $count=Skill::all()->count();
        if($count==0){
            session()->flash('error','First You Need To Add Some Skills');
            return redirect(route('skills.index'));
        }
        return $next($request);
    }
}
