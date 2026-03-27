<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'home'])->name('home');

// Route::get('/', function () {
//     return view('pages.banner');
// })->name('home');

// Route::get('/login', function () {
//     return view('/pages/login');
// });

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')->name('register');



Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::post('/register', [RegisteredUserController::class,'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// ================= CART =================

// ✅ Add to Cart (POST)
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');

// ✅ View Cart Page
Route::get('/cart', [ProductController::class, 'cart'])->name('cart.index');

// ✅ Remove Item (optional but recommended)
Route::post('/cart/remove/{id}', [ProductController::class, 'remove'])->name('cart.remove');

//increase and decrease of items
Route::post('/cart/increase/{id}', [ProductController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [ProductController::class, 'decrease'])->name('cart.decrease');



// paymongo payment
Route::middleware(['auth'])->group(function () {
    Route::post('/checkout/paymongo', [ProductController::class, 'paymongoCheckout'])
        ->name('checkout.paymongo');
});


//add success and cancell handler
Route::middleware(['auth'])->group(function () {
    Route::get('/payment/success', [ProductController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [ProductController::class, 'paymentCancel'])->name('payment.cancel');
});


//admin page order page
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/orders', [ProductController::class, 'orders'])->name('admin.orders');

});
