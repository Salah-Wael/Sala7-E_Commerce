<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function seachAboutProducts($products){
        $categories = DB::table('categories')->get();

        return view('product.index')->with(['products' => $products, 'categories' => $categories]);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%');
        $category = Category::where('name', 'like', '%' . $search . '%');
        if($category){
            $category->
            return redirect()->route('category.show');
        }
        elseif($products){
            return redirect()->route('search.product', $products);//('search', ['products' => $result, 'search' => $search]);
        }else{
            return "Not Found";
        }

    }
}
