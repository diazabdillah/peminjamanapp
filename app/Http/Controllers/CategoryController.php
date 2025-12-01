<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Tambahkan middleware otorisasi Admin di sini
    public function __construct()
    {
        // ... Logika middleware otorisasi admin ...
    }

    // Index (Menampilkan daftar kategori)
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    // Store (Menyimpan kategori baru)
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:categories,name']);
        
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    // ... create, show, edit, update, destroy (Logika CRUD lainnya)
}