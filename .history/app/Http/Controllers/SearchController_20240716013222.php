<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%');
        $category = Category::where('name', 'like', '%' . $search . '%');
        if($category){
            return redirect()->route('')
        }
        elseif($products){
            return view('search', ['products' => $result, 'search' => $search]);
        }

    }
}
