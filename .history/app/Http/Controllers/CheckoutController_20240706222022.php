<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show(){
        $productsInCart = Cart::with('product')
                                ->where('user_id', $this->userId)
                                ->get();
        dd($productsInCart)
        // $productDetails = $productsInCart->product;

        return view('checkout', compact('productsInCart', 'productDetails'));
    }
}
