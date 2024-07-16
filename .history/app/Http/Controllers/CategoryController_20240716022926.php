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

    public function show(string $category)
    {
        $result = Product::where('category_name', '=', $category)->get();
        return redirect()->route('product.index', ['products' => $result]);
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
