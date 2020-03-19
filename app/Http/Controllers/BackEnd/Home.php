<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;

class Home extends BackEndController
{
    public function index(){
        return view('back-end.home');
    }
}
