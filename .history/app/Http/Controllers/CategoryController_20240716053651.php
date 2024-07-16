<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function index()
    {
        $result = DB::table('categories')->get();
        return view('welcome', ['categories' => $result]);
    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }

}
