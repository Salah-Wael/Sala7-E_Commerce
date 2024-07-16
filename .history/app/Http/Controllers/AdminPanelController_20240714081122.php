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
    public function fontAwesomeIcons(){
        return view('admin.components.font-awesome-icons');
    }
    public function simpleLineIcons(){
        return view('admin.components.simple-line-icons');
    }
    public function typography(){
        return view('admin.components.typography');
    }
    public function iconMenu(){
        return view('admin.icon-menu');
    }
    public function f(){
        return view('admin.icon-menu');
    }
    public function charts(){
        return view('admin.charts');
    }
}
