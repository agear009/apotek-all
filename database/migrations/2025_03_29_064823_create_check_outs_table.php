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
        Schema::create('check_outs', function (Blueprint $table) {
        $table->id();
        $table->string('order_id');
        $table->string('user_id');
        $table->string('nama_pemesan');
        $table->string('no_hp');
        $table->string('email');
        $table->string('produk_id');
        $table->string('nama_produk');
        $table->string('id_resep');
        $table->string('nama_dokter');
        $table->string('hasil_diagnosa');
        $table->string('toko_id');
        $table->string('nama_toko');
        $table->string('alamat_toko');
        $table->string('no_hp_toko');
        $table->string('jumlah');
        $table->string('harga');
        $table->string('status_checkout');
        $table->string('tanggal_checkout');
        $table->string('alamat_tujuan_pengiriman');
        $table->string('kota');
        $table->string('provinsi');
        $table->string('kode_pos');
        $table->string('metode_pengiriman');
        $table->string('nama_pengirim');
        $table->string('ongkos_kirim');
        $table->string('metode_pembayaran');
        $table->string('status_pembayaran');
        $table->string('token_transaksi_midtrans');
        $table->string('total_pembayaran');
        $table->string('pajak');
        $table->string('catatan');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_outs');
    }
};
