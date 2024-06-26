<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {

    }

    public function index()
    {
        $products = DB::table('products')->orderBy('created_at', 'desc')->get();
        $categories = DB::table('categories')->get();

        return view('product.index', compact('products', 'categories'));
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
