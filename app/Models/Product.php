<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import untuk tipe data relasi
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 
        'name', 
        'slug', 
        'description', 
        'price', 
        'stock', 
        'image', // Gambar utama/thumbnail
        'is_available',
    ];
    
    // Pastikan kolom image di tabel products dihapus jika Anda hanya mengandalkan ProductImage, 
    // tetapi jika ingin mempertahankan thumbnail, biarkan kolom 'image' tetap ada.

    /**
     * Relasi: Produk dimiliki oleh satu Kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi: Produk memiliki banyak Gambar.
     * Gambar diurutkan berdasarkan sort_order.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }
}
