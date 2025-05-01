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
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_produk');
            $table->string('id_toko');
            $table->string('id_user');
            $table->text('jumlah');
            $table->string('dilihatuser');
            $table->string('dilihattoko');
            $table->string('tipe_barang');
            $table->string('price');
            $table->string('image');
            $table->string('berat');
            $table->string('status');
            $table->string('jumlah_maksimal_beli');
            $table->string('ongkir_toko');
            $table->string('ongkir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjangs');
    }
};
