<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show(){
        $productsInCart = Cart::where('user_')
        return view('checkout');
    }
}
