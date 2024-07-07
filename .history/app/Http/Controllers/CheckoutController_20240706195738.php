<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show(){
        $productsInCart = Cart::where('user_id', )
        return view('checkout');
    }
}
