<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show() {
        $user = Auth::user()->f
        return view('cart.show');
    }

    public function store($id){
        $cart = new Cart();
        $cart->quantity = $request->quantity;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->save();
    }
}
