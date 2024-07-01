<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show($id) {
        $User = User::find($id);
        return view('cart.show',compact(Auth::user()->id));
    }

    public function store($id){
        $prodcut = Product::find($id);
        $cart = new Cart();
        $cart->quantity = $prodcut->quantity;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $prodcut->id;
        $cart->save();
    }
}
