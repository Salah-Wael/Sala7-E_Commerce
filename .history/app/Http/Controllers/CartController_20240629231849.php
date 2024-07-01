<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show() {
        return view('cart.show');
    }

    public function store($id){
        // user_id = $id
        $cart = new Cart();
        $cart->quantity = $request->quantity;
        $cart->user_id = $request->description;
        $cart->product_id = $request->price;
        $cart->save();
    }
}
