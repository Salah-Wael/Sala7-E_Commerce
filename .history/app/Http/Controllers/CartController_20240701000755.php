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
            
            return view('cart.show', compact('productsCart'));
        } else {
            return view('error.404')->with(['message' => 'User ID not found']);
        }
    }

    public function store($productId)
    {
        // Find the product by its ID
        $product = Product::find($productId);

        // If the product is not found, redirect back with an error message
        if (!$product) {
            return redirect()->route('product.index')->with(['error' => 'Product not found']);
        }

        // Check if the product is already in the cart
        $cartItem = Cart::where('product_id', $productId)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($cartItem) {
            // Update the quantity if the product already exists in the cart
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Create a new cart item if the product is not in the cart
            $cartItem = new Cart();
            $cartItem->quantity = 1; // Set the default quantity to 1
            $cartItem->user_id = Auth::user()->id;
            $cartItem->product_id = $product->id;
            $cartItem->save();
        }

        return redirect()->route('product.index')->with(['success' => 'The product added to your Cart successfully']);
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
