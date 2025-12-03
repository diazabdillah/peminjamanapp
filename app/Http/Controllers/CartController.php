<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Wajib di-import
use Illuminate\Support\Facades\Auth; // Tetap di-import jika digunakan di luar class (misal: Blade)

class CartController extends Controller
{
    // CATATAN: Metode getUserCart() dihapus karena kita menggunakan session()->get('cart')

    public function index()
    {
        $sessionCart = session()->get('cart', []);
        $cartItems = collect();
        $subtotal = 0;

        foreach ($sessionCart as $productId => $itemData) {
            $product = Product::find($productId);

            if ($product && isset($itemData['quantity'])) {
                $quantity = $itemData['quantity'];
                $itemSubtotal = $quantity * $product->price;

                $item = (object)[
                    'id' => $productId,
                    'quantity' => $quantity,
                    'product' => $product,
                    'subtotal' => $itemSubtotal
                ];

                $cartItems->push($item);
                $subtotal += $itemSubtotal;
            } else {
                Session::forget("cart.$productId");
            }
        }
        
        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    public function store(Request $request)
    {
        // ... (Metode store Anda sudah benar dan berbasis Session) ...
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        $cart = session()->get('cart', []);
        $productId = $request->product_id;
        $quantityToAdd = $request->quantity;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantityToAdd;
        } else {
            $product = Product::findOrFail($productId);
            
            $cart[$productId] = [
                "id" => $productId,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $quantityToAdd,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Memperbarui kuantitas item tertentu.
     * PERBAIKAN: Menggunakan Session array manipulation.
     */
    public function update(Request $request, $productId) // $itemId diubah menjadi $productId
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        
        $cart = session()->get('cart', []);
        $newQuantity = $request->quantity;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $newQuantity;
            session()->put('cart', $cart);
            return back()->with('success', 'Kuantitas diperbarui.');
        }

        return back()->with('error', 'Item tidak ditemukan.');
    }

    /**
     * Menghapus item dari Keranjang.
     * PERBAIKAN: Menggunakan Session array manipulation.
     */
    public function destroy($productId) // $itemId diubah menjadi $productId
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]); // Hapus key produk dari array
            session()->put('cart', $cart);
            return back()->with('success', 'Item dihapus dari keranjang.');
        }
        
        return back()->with('error', 'Item tidak ditemukan.');
    }
    
    /**
     * Mengosongkan Keranjang.
     */
public function clear()
{
    $productId = (int) $productId; // Atau tambahkan (string) jika perlu

    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        // Item ditemukan
        unset($cart[$productId]); 
        session()->put('cart', $cart);
        return back()->with('success', 'Item dihapus dari keranjang.');
    }
    
    // Item tidak ditemukan (error Anda berasal dari sini)
    return back()->with('error', 'Item tidak ditemukan.');
}
}