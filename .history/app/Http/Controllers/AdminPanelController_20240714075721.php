<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index(){
        return view('admin.layouts.index');
    }

    public function avatars(){
        return view('admin.components.avatars');
    }
    public function buttons(){
        return view('admin.components.buttons');
    }
    public function gridsystem(){
        return view('admin.components.gridsystem');
    }
    public function panels(){
        return view('admin.components.panels');
    }
    public function notifications(){
        return view('admin.components.notifications');
    }
    public function sweetalert(){
        return view('admin.components.sweetalert');
    }
    public function sweetalert(){
        return view('admin.components.sweetalert');
    }
    public function charts(){
        return view('admin.charts');
    }
}
