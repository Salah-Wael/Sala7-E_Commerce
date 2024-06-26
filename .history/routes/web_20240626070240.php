<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $result = DB::table('categories')->get();
    return view('welcome', ['categories' => $result]);
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','showLogin')->name('login');
    Route::get('/','showLogin');
    Route::post('/login','login');


    Route::get('/register', 'showRegister');
    Route::post('/register', 'register');

    Route::get('/forgot-password', 'showForgotPassword')->name('forgot-Password');
    Route::post('/forgot-password', 'forgotPassword');

    Route::post('/logout','logout')->name('logout')->middleware('auth');
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

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::controller(CategoryController::class)->group(function () {

    Route::get('/category', 'index');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/product/create', 'create')->name('product.create');
    Route::post('/product/store', 'store')->name('product.store');
    Route::get('/product/{id}', 'show')->name('product.show');
    Route::get('/product/{id}/edit', 'edit')->name('product.edit');
    Route::put('/product/{id}', 'update')->name('product.update');
    Route::delete('/product/{id}/delete', 'delete')->name('product.delete');
});
