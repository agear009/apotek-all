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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('id_produk')->nullable();
            $table->string('id_user')->nullable();
            $table->string('id_toko')->nullable();
            $table->string('waktu_order')->nullable();
            $table->string('waktu_pengiriman')->nullable();
            $table->string('perkiraan_sampai')->nullable();
            $table->string('nama_pengirim')->nullable();
            $table->text('jumlah')->nullable();
            $table->text('harga')->nullable();
            $table->text('ongkir')->nullable();
            $table->text('total_harga')->nullable();
            $table->text('jenis_pembayaran')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
