<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Import Category
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Asumsi: Hanya Admin yang bisa mengakses CRUD
    
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('product-images', 'public');
        }

        $validated['slug'] = Str::slug($request->name);
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function show(Product $product)
    {
        // Catatan: Karena Anda menggunakan Route Model Binding dengan kunci kustom (:slug),
        // Laravel secara otomatis mencari dan mengambil objek Product
        // yang kolom 'slug'-nya cocok dengan nilai yang ada di URL.
        // Jika tidak ditemukan, Laravel akan otomatis melempar 404 (Not Found).
        
        // Memuat relasi yang diperlukan (misalnya: kategori dan multi-gambar)
        $product->load(['category', 'images']);

        return view('products.show', compact('product'));
    }
public function productsByCategory(string $categorySlug)
    {
        // 1. Cari kategori berdasarkan slug, jika tidak ada lempar 404
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // 2. Ambil produk-produk yang berelasi dengan kategori tersebut
        $products = $category->products()->latest()->paginate(10);

        // 3. Kembalikan view index produk (Anda bisa menggunakan ulang view produk utama)
        return view('products.index', compact('products', 'category'));
    // ... Implementasikan show, edit, update, destroy
    }
    public function categories(){
         return view('category');
    }
}