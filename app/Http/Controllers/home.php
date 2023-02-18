<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home extends Controller
{
    public function welcome(){
        return view('welcome');
    }
}
