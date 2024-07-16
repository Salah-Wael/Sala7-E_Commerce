<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $categories = DB::table('categories')->get();
        return view('category.index', ['categories' => $categories]);
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
