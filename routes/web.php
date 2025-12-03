<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthController;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   // Ambil data paket (type = 'package')
        $products = Product::where('type', 'package')
                           ->orderBy('price', 'asc')
                           ->get();

        // Ambil data item terpisah (type = 'addon')
        $addons = Product::where('type', 'addon')
                         ->orderBy('price', 'asc')
                         ->get();

        return view('landingpage', compact('products', 'addons'));
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); // <-- RUTE YANG HILANG
    // Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/catalog/{categorySlug}', [ProductController::class, 'productsByCategory'])
    ->name('products.category'); // <--- Ini yang menyelesaikan error
Route::get('/categories', [ProductController::class, 'categories'])->name('products.categories'); 
// Rute standar katalog produk
Route::get('/catalog', [ProductController::class, 'index'])->name('products.index'); 
// Rute detail produk
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('products.show');


//route fix
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/checkout/confirmation', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Order Management
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    // Payment Initiation
Route::get('/payment/{order}', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/notification', [PaymentController::class, 'handleNotification'])->name('midtrans.notification');

Route::get('register', [AuthController::class, 'registerForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

    // Login
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout');