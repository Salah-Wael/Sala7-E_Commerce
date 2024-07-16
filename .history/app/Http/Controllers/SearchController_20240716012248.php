<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        if()
        $result = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('search', ['products' => $result, 'search' => $search]);

    }
}
