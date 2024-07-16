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
    public function sidebarStyleTwo(){
        return view('admin.layouts.sidebar-style-2');
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
    public function forms(){
        return view('admin.forms.forms');
    }
    public function tables(){
        return view('admin.tables.tables');
    }
    public function dataTables(){
        return view('admin.tables.datatables');
    }
    public function googleMaps(){
        return view('admin.maps.googlemaps');
    }
    public function jsvectorMap(){
        return view('admin.maps.jsvectormap');
    }
    public function charts(){
        return view('admin.charts.charts');
    }
    public function sparkLine(){
        return view('admin.charts.sparkline');
    }
    public function widgets(){
        return view('admin.widgets');
    }
}
