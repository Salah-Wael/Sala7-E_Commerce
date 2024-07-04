<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ImageController;

class ProductImagesController extends Controller
{
    public function showProductImages($productId)
    {
        $productImages = DB::table('product_images')->where('product_id', $productId)->get();
        $product = Product::find($productId);
        return view('product.product-images', compact('productImages', 'product'));
    }

    public function storeImages(Request $request, $productId){

        // public static function storeImage($request, string $columnName, string $pathAfterPublic)
        // {
        //     if ($request->file($columnName)) {

        //         $image = $request->file($columnName);
        //         $imageName = uniqid() . $image->getClientOriginalName();
        //         $noSpacesString = str_replace(' ', '', $imageName);
        //         $image->move(public_path($pathAfterPublic), $noSpacesString);

        //         return $noSpacesString;
        //     }
        // }
        ImageController::storeImage($request, 'image')

        DB::table('product_images')->insert([
            'image_path' => $request->image_path,
            'product_id' => $productId,
        ]);
        return redirect()->route('product.show', $productId)->with('success', 'Images uploaded successfully.');
    }

    public function deleteImage($imageId){

        $productImage = DB::table('product_images')->where('id', $imageId)->first();
        if ($productImage) {
            $productId = $productImage->product_id;
            DB::table('product_images')->where('id', $imageId)->delete();
            return redirect()->route('product.show.images', compact('productId'))->with(['success' => "product's image deleted successfully"]);
        }
        else{
            return redirect()->route('error.404')->with(['message' => "product's image not found"]);
        }
    }
}
