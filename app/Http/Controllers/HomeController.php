<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Playlist;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $tags=Tag::all()->count();
        $skills=Skill::all()->count();
        $cat=Category::all()->count();
        $numAdmins=User::whereRoleIs('admin')->count();
        $numUsers=User::whereRoleIs('user')->count();
        $plays=Playlist::withTrashed()->count();
        $vids=Video::withTrashed()->count();
        $posts=Playlist::withTrashed()->count();

        return view(
            'home',
            compact('tags', 'skills', 'cat', 'numUsers', 'numAdmins', 'vids', 'posts', 'plays')
        );
    }
}
