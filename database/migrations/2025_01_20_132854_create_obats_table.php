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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('id_toko');
            $table->string('category');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('dosis')->nullable();
            $table->string('bentuk')->nullable();
            $table->text('aturan_pakai')->nullable();
            $table->text('komposisi')->nullable();
            $table->text('kemasan')->nullable();
            $table->text('resep')->nullable();
            $table->text('jenis_obat')->nullable();
            $table->text('jangan_digunakan_oleh')->nullable();
            $table->text('efek_samping')->nullable();
            $table->text('kadaluarsa')->nullable();
            $table->text('produksi')->nullable();
            $table->text('produsen')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('price')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('status')->nullable();
            $table->string('stock')->nullable();
            $table->string('promo')->nullable();
            $table->string('merek')->nullable();
            $table->string('best_seller')->nullable();
            $table->string('jumlah_penjualan')->nullable();
            $table->string('jumlah_maksimal_beli')->nullable();
            $table->string('berat')->nullable();
            $table->string('harga_coret')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
