<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function error404()
    {
        return view('error.404');
    }

    public s function error401()
    {
        return view('error.401');
    }
}
