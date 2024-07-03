<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImagesController extends Controller
{
    public function showProductImages($productId)
    {
        $productImages = DB::table('product_images')->where('product_id', $productId)->get();
        $product = Product::find($productId);
        return view('product-images.show', compact('productImages', 'product'));
    }

    public function storeImages(){

    }

    public function deleteImage($imageId){

        $productId = DB::table('product_images')->where('id', $imageId)->select(['product_id']);
        DB::table('product_images')->where('id', $imageId)->delete();
        return redirect()->route('product.show.images', )->with(['success' => "product's image deleted successfully"]);
    }
}
