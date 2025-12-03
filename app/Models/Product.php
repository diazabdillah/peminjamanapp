<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str; // Tambahkan ini jika Anda menggunakan Slug otomatis

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
        'image', 
        'is_available',
        'type', 
        'tag', 
        'features', 
        'icon',
    ];
    
    // Cast kolom numerik/JSON
    protected $casts = [
        'price' => 'integer',
        'stock' => 'integer',
        'is_available' => 'boolean',
        'features' => 'array', // PENTING: Mengubah string JSON menjadi PHP array
    ];

    // Accessor/Mutator (Opsional tapi berguna untuk slug otomatis)
    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($product) {
    //         $product->slug = Str::slug($product->name);
    //     });
    // }

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
        // Asumsi model ProductImage sudah ada dan memiliki foreign key product_id
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }
    
    // --- QUERY SCOPE (Opsional tapi Direkomendasikan) ---
    
    /**
     * Scope untuk mengambil hanya produk tipe Paket.
     */
    public function scopePackages($query)
    {
        return $query->where('type', 'package');
    }

    /**
     * Scope untuk mengambil hanya produk tipe Add-ons.
     */
    public function scopeAddons($query)
    {
        return $query->where('type', 'addon');
    }
}