<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show() {
        return view('cart.show');
    }

    public function store($id){
        // user_id = $id
        $cart = new Cart();
        $product->quantity = $request->quantity;
        $product->name = $request->name;
        $product->user_id = $request->description;
        $product->product_id = $request->price;
        $product->category_name = $request->category_name;
        $product->image_path = ImageController::storeImage($request, 'image_path', 'assets/img/products/');
        $product->save();
    }
}
