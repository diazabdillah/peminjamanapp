<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
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
    $product1 = Product::join('categories', 'products.category_id', '=', 'categories.id')
    ->select(
        // Perbaikan: Gunakan 'products.name' (tabel jamak)
        'products.name', 
        'products.description',
        'products.price',
        'products.image',
        'products.category_id',
        // Kolom dari tabel categories
        'categories.nama_kategori'
    )
    ->where('stock','>', 0)
    ->get();
    return view('landingpage', compact('product1'));
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

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