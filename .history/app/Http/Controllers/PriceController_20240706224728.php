<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public static function subTotal($foreachVariable, $quantity, $price)
    {
        $totalPrice = 0;
        foreach ($foreachVariable as $cart) {
            $totalPrice += $cart->quantity * $cart->price;
        }
        return $totalPrice;
    }
}
