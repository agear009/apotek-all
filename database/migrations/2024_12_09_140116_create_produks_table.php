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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('id_toko')->nullable();
            $table->string('category')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('merek')->nullable();
            $table->string('status')->nullable();
            $table->string('stock')->nullable();
            $table->string('promo')->nullable();
            $table->string('best_seller')->nullable();
            $table->string('jumlah_penjualan')->nullable();
            $table->string('jumlah_maksimal_beli')->nullable();
            $table->string('berat')->nullable();
            $table->string('harga_coret')->nullable();
            $table->text('produksi')->nullable();
            $table->text('produsen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
