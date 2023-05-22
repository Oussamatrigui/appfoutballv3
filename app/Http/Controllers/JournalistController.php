<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JournalistController extends Controller
{
    public function dash(){

        return view ('journalist.dash');

    }
}
