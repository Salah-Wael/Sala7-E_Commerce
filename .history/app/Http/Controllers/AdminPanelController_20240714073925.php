<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function avatars(){
        return view('admin.components.avatars');
    }
    public function buttons(){
        return view('admin.components.buttons');
    }
    public function charts(){
        return view('admin.components.charts');
    }
    public function charts(){
        return view('admin.charts');
    }
}
