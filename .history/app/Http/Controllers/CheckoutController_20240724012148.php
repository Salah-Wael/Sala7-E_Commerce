<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Models\OrderDetail;
use App\Models\OrderRecipient;

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
            ->select('carts.*', 'products.name', 'products.price', 'products.image_path')
            ->get();
        $subTotalPrice = PriceController::subTotal($productsInCart);

        $productsInCart['subTotalPrice'] = PriceController::subTotal($productsInCart);
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();

        return view('checkout', compact('productsInCart', 'countries', 'cities'));
    }

    public function showPreviousCheckoutedOrders() {
    $orderRecipients = OrderRecipient::with('orders.product')->where('order_maker_id', $this->userId)->get();
    $orderRecipients->each(function ($recipient) {
        $recipient->orders->subtotal = PriceController::subTotal($recipient->orders);
    });

    return view('previous-checkouted-orders', compact('orderRecipients'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'comment' => 'nullable|string|max:500',
        ]);

        $recipient = OrderRecipient::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'comment' => $request->comment,
            'order_maker_id' => $this->userId,
        ]);

        $cart = Cart::with('product')->where('user_id', Auth::user()->id)->get();

        $orderDetails = [];
        foreach ($cart as $item) {
            $orderDetails[] = [
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'product_id' => $item->product->id,
                'order_recipient_id' => $recipient->id,
                'order_maker_id' => $this->userId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        OrderDetail::insert($orderDetails);

        Cart::where('user_id', $this->userId)->delete();

        return redirect()->route('home')->with('success', 'Your Order created successfully');
    }
}
