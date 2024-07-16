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

    public function show( $category)
    {
        function ($category = Null) {
            if (is_null($category)) {
                $result = DB::table('products')->get();
            } else {
                $result = Product::where('category_name', '=', $category)->get();
            }
            return view('product', ['products' => $result]);
        }
    }

    public function index()
    {

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
