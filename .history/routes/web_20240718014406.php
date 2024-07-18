<?php

use App\Models\OrderRecipient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\AdminPanelController;
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
    Route::get('/error-401', 'error401')->name('error.401');
});

Route::controller(LanguageController::class)->group(function () {
    Route::get('lang/{locale}', 'changeLanguage')->name('language.change');
});

Route::prefix('admin')->controller(AdminPanelController::class)->group(function () {
    Route::get('/panel', 'index')->name('admin.panel.index')->middleware('checkrole:admin');
    Route::get('/avatars', 'avatars')->name('admin.panel.avatars')->middleware('checkrole:admin');
    Route::get('/buttons', 'buttons')->name('admin.panel.buttons')->middleware('checkrole:admin');
    Route::get('/gridsystem', 'gridsystem')->name('admin.panel.gridsystem')->middleware('checkrole:admin');
    Route::get('/panels', 'panels')->name('admin.panel.panels')->middleware('checkrole:admin');
    Route::get('/notifications', 'notifications')->name('admin.panel.notifications')->middleware('checkrole:admin');
    Route::get('/sweetalert', 'sweetalert')->name('admin.panel.sweetalert')->middleware('checkrole:admin');
    Route::get('/font-awesome-icons', 'fontAwesomeIcons')->name('admin.panel.font-awesome-icons')->middleware('checkrole:admin');
    Route::get('/simple-line-icons', 'simpleLineIcons')->name('admin.panel.simple-line-icons')->middleware('checkrole:admin');
    Route::get('/typography', 'typography')->name('admin.panel.typography')->middleware('checkrole:admin');
    Route::get('/icon-menu', 'iconMenu')->name('admin.panel.icon-menu')->middleware('checkrole:admin');
    Route::get('/forms', 'forms')->name('admin.panel.forms')->middleware('checkrole:admin');
    Route::get('/tables', 'tables')->name('admin.panel.tables')->middleware('checkrole:admin');
    Route::get('/datatables', 'dataTables')->name('admin.panel.datatables')->middleware('checkrole:admin');
    Route::get('/maps-googlemaps', 'googleMaps')->name('admin.panel.googlemaps')->middleware('checkrole:admin');
    Route::get('/maps-jsvectormap', 'jsvectorMap')->name('admin.panel.jsvectormap')->middleware('checkrole:admin');
    Route::get('/charts/charts', 'charts')->name('admin.panel.charts')->middleware('checkrole:admin');
    Route::get('/charts/sparkline', 'sparkLine')->name('admin.panel.sparkline')->middleware('checkrole:admin');
    Route::get('/widgets', 'widgets')->name('admin.panel.widgets')->middleware('checkrole:admin');
});

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/orders', function () {
    $orderRecipients = OrderRecipient::with('orders.product')->get();
    $orderRecipients->each(function ($recipient) {
        $recipient->orders->subtotal = PriceController::subTotal($recipient->orders);
    })->middleware('checkrole:admin');

    return view('admin.all-checkout-orders')->with(['orderRecipients' => $orderRecipients]);
})->name('orders');

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'show')->name('cart.show')->middleware('auth');
    Route::post('/cart/{productId}/store', 'store')->name('cart.store')->middleware('auth');
    Route::put('/cart/update-quantities', 'updateQuantities')->name('cart.quantities.update')->middleware('auth');
    Route::delete('/cart/{id}/delete', 'deleteProductFromCart')->name('cart.delete')->middleware('auth');
    
});

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'show')->name('checkout.show')->middleware('auth');
    Route::get('/previous/checkout/orders', 'showPreviousCheckoutedOrders')->name('previous.checkout.show')->middleware('auth');
    Route::post('/checkout/store/order', 'store')->name('order.store')->middleware('auth');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category.index');
});

Route::controller(SearchController::class)->group(function () {
    Route::post('/search/products', 'seachAboutProducts')->name('search.product');
    Route::post('/search', 'search')->name('search');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/all-products', 'productsTable')->name('product.table')->middleware('auth');
    Route::get('/product/create', 'create')->name('product.create')->middleware('checkrole:admin');
    Route::get('/{category}/products', 'getProductsByCategory')->name('product.category.show');

    Route::post('/product/store', 'store')->name('product.store')->middleware('checkrole:admin');
    Route::get('/product/{id}', 'show')->name('product.show')->middleware('auth');
    Route::get('/product/{id}/edit', 'edit')->name('product.edit')->middleware('checkrole:admin');
    Route::put('/product/{id}', 'update')->name('product.update')->middleware('checkrole:admin');
    Route::delete('/product/{id}/delete', 'delete')->name('product.delete')->middleware('checkrole:admin');
});

Route::controller(ProductImagesController::class)->group(function () {
    Route::get('/product/{productId}/images', 'showProductImages')->name('product.show.images')->middleware('auth');
    Route::post('/product/{productId}/store/images', 'storeImages')->name('product.store.images')->middleware('checkrole:admin');
    Route::delete('/product/image/{imageId}/delete', 'deleteImage')->name('product.delete.image')->middleware('checkrole:admin');
});

Route::controller(NewsController::class)->group(function () {
    Route::get('/news/create', 'create')->name('news.create')->middleware('checkrole:admin,salesman');
    Route::post('/news/store', 'store')->name('news.store')->middleware('checkrole:admin,salesman');
    Route::get('/news/{newsId}', 'show')->name('news.show');
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/{news}/edit', 'edit')->name('news.edit')->middleware('checkrole:admin,salesman');
    Route::put('/news/{newsId}', 'update')->name('news.update')->middleware('checkrole:admin,salesman');
    Route::delete('/news/{newsId}/delete', 'delete')->name('news.delete')->middleware('checkrole:admin,salesman');
});

Route::controller(NewsController::class)->group(function () {
    Route::get('/news/create', 'create')->name('news.create')->middleware('checkrole:admin,salesman');
    Route::post('/news/store', 'store')->name('news.store')->middleware('checkrole:admin,salesman');
    Route::get('/news/{newsId}', 'show')->name('news.show');
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/{news}/edit', 'edit')->name('news.edit')->middleware('checkrole:admin,salesman');
    Route::put('/news/{newsId}', 'update')->name('news.update')->middleware('checkrole:admin,salesman');
    Route::delete('/news/{newsId}/delete', 'delete')->name('news.delete')->middleware('checkrole:admin,salesman');
});