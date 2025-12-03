<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Kolom baru untuk membedakan paket dan add-on
            $table->enum('type', ['package', 'addon'])->default('package')->after('id'); 
            // Kolom untuk tag/deskripsi singkat paket
            $table->string('tag')->nullable()->after('price');
            // Kolom untuk fitur paket (disimpan sebagai JSON string)
            $table->string('features')->nullable()->after('tag');
            // Kolom untuk ikon add-on (misalnya, font awesome class)
            $table->string('icon')->nullable()->after('features');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['type', 'tag', 'features', 'icon']);
        });
    }
};