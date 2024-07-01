<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // public $userId = Auth::user()->id;
    

    public static function cartSubTotalPrice($carts)
    {
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->quantity * $cart->price;
        }
        return $totalPrice;
    }
    public function show($userId)
    {
        if ($this->userId == $userId) {
            $productsCart = User::with('products')->find($userId);

            $carts = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('carts.*', 'products.name', 'products.price')
            ->get();
            
            $subTotalPrice = CartController::cartSubTotalPrice($carts);

            return view('cart.show', compact('productsCart', 'carts', 'subTotalPrice'));
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
            ->where('user_id', $this->userId)
            ->first();

        if ($cartItem) {
            // Update the quantity if the product already exists in the cart
            $cartItem->quantity += $product->quantity;
            $cartItem->save();
        } else {
            // Create a new cart item if the product is not in the cart
            $cartItem = new Cart();
            $cartItem->quantity = $product->quantity; // Set the default quantity to 1
            $cartItem->user_id = $this->userId;
            $cartItem->product_id = $product->id;
            $cartItem->save();
        }

        return redirect()->route('product.index')->with(['success' => 'The product added to your Cart successfully']);
    }

    public function updateQuantities(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // foreach($request as $row){
        //     Cart::where('product_id', $productId)->where('user_id', $this->userId)->get();
        //     $cart->quantity = $request->quantity;
        //     $cart->save();
        // }
        // return redirect()->route('cart.show', $this->userId)->with(['success' => 'Quantity updated successfully']);
        $quantities = $request->input('quantities', []);

        foreach ($quantities as $productId => $quantity) {
            Cart::where('user_id', $this->userId)
                ->where('product_id', $productId)
                ->update(['quantity' => $quantity]);
        }

        return redirect()->route('cart.show', $this->userId)->with('success', 'Cart updated successfully');
    }

    public function deleteProductFromCart($productId)
    {
        $deleteFromCart = Cart::where('user_id', $this->userId)->where('product_id', $productId)->first();
        if ($deleteFromCart) {
            $deleteFromCart->delete();
            return redirect()->route('cart.show', $this->userId)->with(['success' => 'Oops! the product is deleted']);
        } else {
            return view('error.404')->with(['message' => 'User ID not found']);
        }
    }
}
