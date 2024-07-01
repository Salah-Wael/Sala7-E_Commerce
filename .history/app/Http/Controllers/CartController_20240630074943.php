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
        if (Auth::user()->id == $userId) {
            $productsCart = User::with('products')->find($userId);
            return $productsCart;
            $products = $productsCart->products;
            return view('cart.show', compact('productsCart', 'products'));
        } else {
            return view('error.404')->with(['message' => 'User ID not found']);
        }
    }

    public function store($productId)
    {
        $product = Product::find($productId);
        // return $product;
        // $result = Cart::where('product_id', $productId)->where('user_id', Auth::user()->id)->first();
        // if ($result) {
        //     // return $result;
        //     $result->quantity = $result->quantity + 1;
        //     $result->save();
        //     return redirect()->route('product.index')->with(['success' => 'The product added to your Cart successfully']);
        } if ($product) {
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

    public function deleteProductFromCart($productId)
    {
        $deleteFromCart = Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->first();
        if ($deleteFromCart) {
            $deleteFromCart->delete();
            return redirect()->route('cart.show', Auth::user()->id)->with(['success' => 'Oops! the product is deleted']);
        } else {
            return view('error.404')->with(['message' => 'User ID not found']);
        }
    }
}
