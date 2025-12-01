<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            // Foreign key: Menghubungkan gambar ke produk utama
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); 
            $table->string('path'); // Path atau URL gambar (disimpan di storage)
            $table->integer('sort_order')->default(0); // Urutan tampilan gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
