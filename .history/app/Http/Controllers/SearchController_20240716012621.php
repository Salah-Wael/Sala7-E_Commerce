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
        if(){
            return view('search', ['products' => $result, 'search' => $search]);
        }
        elseif(){

        }

    }
}
