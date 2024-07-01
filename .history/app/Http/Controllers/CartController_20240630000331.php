<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show($id)
    {
        if(Auth::user()->id == $id)
        {

            $user = User::find($id)->with('products');
            return view('cart.show', compact('user'));
        }
        
    }

    public function store($id)
    {
        $prodcut = Product::find($id);
        $cart = new Cart();
        $cart->quantity = $prodcut->quantity;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $prodcut->id;
        $cart->save();
    }
}
