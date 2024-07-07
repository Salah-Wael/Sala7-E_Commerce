<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PriceController;

class CartController extends Controller
{
    protected $userId;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->userId = Auth::user()->id;
            } else {
                return redirect()->route('login');
            }

            return $next($request);
        });
    }

    public function show()
    {
        
        $productsCart = User::with('products')->find($this->userId);

        $carts = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $this->userId)
        ->select('carts.*', 'products.name', 'products.price')
        ->get();

        $subTotalPrice = PriceController::subTotal($carts);

        return view('cart.show', compact('productsCart', 'carts', 'subTotalPrice'));
        
    }

    public static function store(Request $request, $productId)
    {
        $product = Product::find($productId);

        // If the product is not found, redirect back with an error message
        if (!$product) {
            return redirect()->route('product.index')->with(['error' => 'Product not found']);
        }

        $request->validate([
            'quantity' => "required|integer|min:$product->quantity",
        ]);

        // Check if the product is already in the cart
        $cartItem = Cart::where('product_id', $productId)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($cartItem) {
            // Update the quantity if the product already exists in the cart
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Create a new cart item if the product is not in the cart
            $cartItem = new Cart();
            $cartItem->quantity = $request->quantity; // Set the default quantity to 1
            $cartItem->user_id = Auth::user()->id;
            $cartItem->product_id = $product->id;
            $cartItem->save();
        }

        return redirect()->route('product.index')->with(['success' => 'The product added to your Cart successfully']);
    }

    public function updateQuantities(Request $request, $return=null)
    {
        $request->validate([
            'quantities.*' => 'required|integer|min:1',
        ]);

        $quantities = $request->input('quantities', []);

        foreach ($quantities as $productId => $quantity) {
            Cart::where('user_id', $this->userId)
            ->where('product_id', $productId)
            ->update(['quantity' => $quantity]);
        }

        return redirect()->route('cart.show')
        ->with('success', 'Cart updated successfully');
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
