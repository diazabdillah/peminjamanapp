<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    
    // Item dihubungkan ke Cart dan Product
    protected $fillable = [
        'cart_id', 
        'product_id', 
        'quantity',
    ];

    public function product(): BelongsTo // Tambahkan tipe data BelongsTo (Opsional tapi disarankan)
    {
        return $this->belongsTo(Product::class);
    }

    // RELASI YANG HILANG (ke Keranjang Induk)
    /**
     * Relasi: Item ini dimiliki oleh satu Cart.
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}