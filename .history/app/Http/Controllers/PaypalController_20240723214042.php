<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class PaypalController extends Controller
{

    

    // public function payment()
    // {
    //     $data = [];
    //     $data['items'] = [
    //         [
    //             'name' => 'Apple',
    //             'price' => 100,
    //             'desc'  => 'Macbook pro 14 inch',
    //             'qty' => 1
    //         ]
    //     ];

    //     $data['invoice_id'] = 1;
    //     $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
    //     $data['return_url'] = 'http://127.0.0.1:8000/paypal/payment';
    //     $data['cancel_url'] = 'http://127.0.0.1:8000/paypal/cancel';
    //     $data['total'] = 100;

    //     $provider = new ExpressCheckout;

    //     $response = $provider->setExpressCheckout($data);

    //     $response = $provider->setExpressCheckout($data, true);

    //     dd($response);
    //     return redirect($response['paypal_link']);
    // }
    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'Apple',
                'price' => 100,
                'desc'  => 'Macbook pro 14 inch',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = 'http://127.0.0.1:8000/paypal/payment';
        $data['cancel_url'] = 'http://127.0.0.1:8000/paypal/cancel';
        $data['total'] = 100;

        $provider = new ExpressCheckout;
        try {
            $response = $provider->setExpressCheckout($data);

            if ($response['paypal_link']) {
                return redirect($response['paypal_link']);
            } else {
                dd($response);
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
