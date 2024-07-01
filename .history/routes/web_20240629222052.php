<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialiteController;

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

Route::get('/contact-us', function(){
    return view('contact');
})->name('contact');

Route::get('/cart', function () {
    return view('cart');
})->name('cart')->middleware('auth');

Route::controller(CategoryController::class)->group(function () {

    Route::get('/category', 'index');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/all-products', 'productsTable')->name('product.table');
    Route::get('/product/create', 'create')->name('product.create')->middleware('auth');
    Route::post('/product/store', 'store')->name('product.store')->middleware('auth');
    Route::get('/product/{id}', 'show')->name('product.show');
    Route::get('/product/{id}/edit', 'edit')->name('product.edit')->middleware('auth');
    Route::put('/product/{id}', 'update')->name('product.update')->middleware('auth');
    Route::delete('/product/{id}/delete', 'delete')->name('product.delete')->middleware('auth');
});


