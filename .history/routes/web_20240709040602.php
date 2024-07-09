<?php

use App\Models\OrderDetail;
use App\Models\OrderRecipient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ProductImagesController;

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    $result = DB::table('categories')->get();
    return view('welcome', ['categories' => $result]);
})->name('home');

Route::controller(SocialiteController::class)->group(function () {
    Route::get('/set-password', 'socialiteSetPassword')->name('socialite.set-password');
    Route::post('/set-password', 'setPassword');

    Route::get('/twitter-login', 'twitterLogin')->name('twitter.login');
    Route::get('/twitter-redirect', 'twitterRedirect')->name('twitter.redirect');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::controller(ErrorController::class)->group(function () {
    Route::get('/error-404', 'error404')->name('error.404');
});

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/orders', function () {
    $OrderRecipient = OrderRecipient::with('recipient')->with('product')->get();
    dd($orderDetails);
    // dd($orderDetails->product);
    return view('orders')->with(['orderDetails' => $orderDetails]);
})->name('orders');

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'show')->name('cart.show')->middleware('auth');
    Route::post('/cart/{productId}/store', 'store')->name('cart.store')->middleware('auth');
    Route::put('/cart/update-quantities', 'updateQuantities')->name('cart.quantities.update')->middleware('auth');
    Route::delete('/cart/{id}/delete', 'deleteProductFromCart')->name('cart.delete')->middleware('auth');
});

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'show')->name('checkout.show')->middleware('auth');
    Route::post('/checkout/store/order', 'store')->name('order.store')->middleware('auth');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/all-products', 'productsTable')->name('product.table')->middleware('auth');
    Route::get('/product/create', 'create')->name('product.create')->middleware('auth');

    Route::post('/product/store', 'store')->name('product.store')->middleware('auth');
    Route::get('/product/{id}', 'show')->name('product.show')->middleware('auth');
    Route::get('/product/{id}/edit', 'edit')->name('product.edit')->middleware('auth');
    Route::put('/product/{id}', 'update')->name('product.update')->middleware('auth');
    Route::delete('/product/{id}/delete', 'delete')->name('product.delete')->middleware('auth');
});

Route::controller(ProductImagesController::class)->group(function () {

    Route::get('/product/{productId}/images', 'showProductImages')->name('product.show.images')->middleware('auth');
    Route::post('/product/{productId}/store/images', 'storeImages')->name('product.store.images')->middleware('auth');
    Route::delete('/product/image/{imageId}/delete', 'deleteImage')->name('product.delete.image')->middleware('auth');
});

