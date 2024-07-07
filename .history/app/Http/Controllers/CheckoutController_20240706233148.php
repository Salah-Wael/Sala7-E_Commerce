<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function show()
    {
        
        $productsInCart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $this->userId)
            ->select('carts.*', 'products.name', 'products.price')
            ->get();

        $subTotalPrice = PriceController::subTotal($productsInCart);


        return view('checkout', compact('productsInCart', 'subTotalPrice'));
    }
}
