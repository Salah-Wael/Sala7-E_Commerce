<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PriceController;
use Srmklive\PayPal\Services\ExpressCheckout;


class PaypalController extends Controller
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
    public function payment()
    {
        


        $cartdata = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $this->userId)
            ->select('carts.*', 'products.name', 'products.price', 'products.image_path')
            ->get();
        $subTotalPrice = PriceController::subTotal($data);

        // return($data);
        $data = [];
        $data['items'] = 

        $data['total'] = $subTotalPrice;

        $data['return_url'] = 'http://127.0.0.1:8000/paypal/payment';
        $data['cancel_url'] = 'http://127.0.0.1:8000/paypal/cancel';

        $provider = new ExpressCheckout;
        try {
            $response = $provider->setExpressCheckout($data);

            if ($response['paypal_link']) {
                return redirect($response['paypal_link']);
            } else {
                // Handle the error if paypal_link is not available
                return redirect()->back()->with('error', 'Something went wrong with PayPal');
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function cancel()
    {
        return response()->json('Your payment is canceled.');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return response()->json('Your payment was successfully.', 200);
        }

        return response()->json('Your payment was failed.', 402);
    }
}
