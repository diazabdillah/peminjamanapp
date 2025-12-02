<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'invoice_number',
    'shipping_address',
    'total_price',
    'status',           // Status Pemrosesan: pending, processing, completed, cancelled
    'payment_status',   // Status Pembayaran: pending, paid, failed, expired
    'payment_token',    // Untuk Midtrans Snap Token
    ];

public function items() { return $this->hasMany(OrderItem::class); }
public function user() { return $this->belongsTo(User::class); }
}
