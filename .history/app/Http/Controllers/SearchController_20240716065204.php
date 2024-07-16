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
        $products = Product::where('name', 'like', '%' . $search . '%')
                            ->orderby('created_at', 'desc')
                            ->paginate(99);
        $category = Category::where('name', 'like', '%' . $search . '%')->first();
        if($category){
            return redirect()->route('category.index', co$category);
        }
        elseif($products){
            return redirect()->route('product.index')->with(['products' => $products]);
        }else{
            return "Not Found";
        }
    }
}
