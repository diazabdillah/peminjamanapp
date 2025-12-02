<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib di-import
class CartController extends Controller
{
    // Helper function untuk mendapatkan Cart milik user saat ini
   private function getUserCart()
    {
        // Panggilan cart() harus didefinisikan sebagai relasi hasOne di App\Models\User
        if (!Auth::check()) {
            // Ini seharusnya dicegah oleh middleware('auth'), tetapi sebagai pengaman
            abort(403, 'Anda harus login untuk mengakses keranjang.');
        }
        
        // Temukan Cart berdasarkan user_id, jika tidak ada, buat Cart baru.
        return Auth::user()->cart()->firstOrCreate(['user_id' => Auth::id()]);
    }

    /**
     * Menampilkan isi Keranjang Belanja.
     */
    public function index()
    {
        $cart = $this->getUserCart();
        // Muat item keranjang beserta detail produk
        $cartItems = $cart->items()->with('product')->get();
        
        $subtotal = $cartItems->sum(fn($item) => $item->quantity * $item->product->price);
        
        // Catatan: Variabel $cartItems, $subtotal, $total digunakan di views/cart/index.blade.php
        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    /**
     * Menambahkan item ke Keranjang atau memperbarui kuantitas.
     */
  public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

       $cart = $this->getUserCart();
       $product = Product::findOrFail($request->product_id);

        // Cek apakah item sudah ada di keranjang
        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // Jika sudah ada, tambahkan kuantitas
            $cartItem->quantity += $request->quantity;
            $cartItem->save(); // save() bekerja karena kita memanggilnya pada objek tunggal
        } else {
            // Jika belum ada, buat item baru
            // CREATE BERHASIL JIKA $fillable DI CartItem.php sudah benar
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Memperbarui kuantitas item tertentu.
     */
    public function update(Request $request, $itemId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        
        // Pastikan item dimiliki oleh Cart user yang sedang login
        $cartItem = $this->getUserCart()->items()->findOrFail($itemId);
        $cartItem->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Kuantitas diperbarui.');
    }

    /**
     * Menghapus item dari Keranjang.
     */
    public function destroy($itemId)
    {
        // Pastikan item dimiliki oleh Cart user yang sedang login
        $this->getUserCart()->items()->findOrFail($itemId)->delete();
        
        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}