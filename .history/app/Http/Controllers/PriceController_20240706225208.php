<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public static function subTotal($foreachVariable, $foreachQuantity, $foreachPrice)
    {
        $totalPrice = 0;
        foreach ($foreachVariable as $item) {
            $totalPrice += $foreachQuantity * $item->price;
        }
        return $totalPrice;
    }
}
