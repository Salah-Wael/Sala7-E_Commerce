<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    public function showProductImages($productId)
    {
        $productImages = DB::table('product_images')->where('product_id', $productId)->get();
        $product = Product::find($productId);
        return view('product.show-product-images', compact('productImages', 'product'));
    }
}
