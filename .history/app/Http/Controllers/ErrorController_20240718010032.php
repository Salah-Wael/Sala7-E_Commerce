<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public sta function error404()
    {
        return view('error.404');
    }

    public static function error401()
    {
        return view('error.401');
    }
}
