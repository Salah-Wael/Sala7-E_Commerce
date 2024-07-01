<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show($userId)
    {
        if(Auth::user()->id == $userId){
            $user = User::with('products')->find($userId);

            return $user->products;
            // return view('cart.show', compact('user'));
        } 
        else {
            return view('error.404')->with(['message' => 'User ID not found']);
        }
    }

    public function store($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $cart = new Cart();
            $cart->quantity = 1; // Set the default quantity to 1, or customize as needed
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $product->id;
            $cart->save();

            return redirect()->route('product.index')->with(['success' => 'The product added to your Cart successfully']);
        } else {
            return redirect()->route('product.index')->with(['error' => 'Product not found']);
        }
    }
}
