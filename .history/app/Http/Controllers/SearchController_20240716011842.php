<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::where('title', 'like', '%' . $search . '%')->get();
        return view('search', ['products' => $products, 'search' => $search]);

    }
}
