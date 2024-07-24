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
    // public function payment()
    // {



    //     $cartData = DB::table('carts')
    //         ->join('products', 'carts.product_id', '=', 'products.id')
    //         ->where('carts.user_id', $this->userId)
    //         ->select('carts.*', 'products.name', 'products.price', 'products.image_path')
    //         ->get();
    //     $subTotalPrice = PriceController::subTotal($cartData);
    //     $cartData['subTotalPrice'] = $subTotalPrice;

    //     // return ($cartData);
    //     $data = [];
    //     $data['items'] = $cartData;

    //     $data['total'] = 3000;

    //     $data['return_url'] = 'http://127.0.0.1:8000/paypal/payment';
    //     $data['cancel_url'] = 'http://127.0.0.1:8000/paypal/cancel';

    //     $provider = new ExpressCheckout;
    //     try {
    //         $response = $provider->setExpressCheckout($data);

    //         if ($response['paypal_link']) {
    //             return redirect($response['paypal_link']);
    //         } else {
    //             // Handle the error if paypal_link is not available
    //             return redirect()->back()->with('error', 'Something went wrong with PayPal');
    //         }
    //     } catch (\Exception $e) {
    //         // Handle any exceptions
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }

    public function payment()
    {
        // Fetch cart data
        $cartData = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $this->userId)
            ->select('carts.*', 'products.name', 'products.price', 'products.image_path')
            ->get();

        // Calculate the subtotal price
        $subTotalPrice = PriceController::subTotal($cartData);

        // Initialize PayPal data
        $data = [];
        $data['items'] = [];
        foreach ($cartData as $item) {
            $data['items'][] = [
                'name' => $item->name,
                'price' => $item->price,
                'desc'  => 'Description for ' . $item->name,
                'qty' => $item->quantity,
            ];
        }

        // Calculate the total price (assuming subTotal includes all item prices)
        $data['total'] = $subTotalPrice;

        // Add other necessary fields
        $data['invoice_id'] = 1; // This should be dynamically generated based on your logic
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = 'http://127.0.0.1:8000/paypal/success';
        $data['cancel_url'] = 'http://127.0.0.1:8000/paypal/cancel';

        $provider = new ExpressCheckout;

        try {
            $response = $provider->setExpressCheckout($data);

            if (isset($response['paypal_link'])) {
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
        return response()->json('Oops! Your payment is canceled.');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect()->route('')->with(['error' => 'Your payment was successfully.']);
        }

        return response()->json('Your payment was failed.', 402);
    }
}
