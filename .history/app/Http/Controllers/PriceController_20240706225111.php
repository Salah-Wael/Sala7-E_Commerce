<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public static function subTotal($foreachVariable, $foreachquantity, $price)
    {
        $totalPrice = 0;
        foreach ($foreachVariable as $item) {
            $totalPrice += $item->quantity * $item->price;
        }
        return $totalPrice;
    }
}
