<?php

namespace App\Http\Middleware;

use App\Models\Skill;
use Closure;

class CheckBeforeDeleteSkill
{
    public function handle($request, Closure $next)
    {
        $id=$request->segment(3);
        $skill=Skill::find($id);
        $count=($skill->playlists->count())+($skill->videos->count())+($skill->posts->count());
        if ($count>0) {
            session()->flash('error', 'Could Not Delete This Skill Because it has An Items Related By it');
            return redirect(route('skills.index'));
        }
        return $next($request);
    }
}
