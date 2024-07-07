<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

class CheckoutController extends Controller
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
        $request->validate([
            'quantities.*' => 'required|integer|min:1',
        ]);

        $quantities = $request->input('quantities', []);

        foreach ($quantities as $productId => $quantity) {
            Cart::where('user_id', $this->userId)
                ->where('product_id', $productId)
                ->update(['quantity' => $quantity]);
        }

        ->with('success', 'Cart updated successfully');
        $productsInCart = DB::table('carts')
                            ->join('products', 'carts.product_id', '=', 'products.id')
                            ->where('carts.user_id', $this->userId)
                            ->select('carts.*', 'products.name', 'products.price')
                            ->get();

        $subTotalPrice = PriceController::subTotal($productsInCart);

        return view('checkout', compact('productsInCart', 'subTotalPrice'));
    }

    public function updateQuantitiesThenShow()
    {
        $productsInCart = DB::table('carts')
                            ->join('products', 'carts.product_id', '=', 'products.id')
                            ->where('carts.user_id', $this->userId)
                            ->select('carts.*', 'products.name', 'products.price')
                            ->get();

        $subTotalPrice = PriceController::subTotal($productsInCart);

        return view('checkout', compact('productsInCart', 'subTotalPrice'));
    }
}
