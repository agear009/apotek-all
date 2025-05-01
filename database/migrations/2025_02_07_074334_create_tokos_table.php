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
        Schema::create('tokos', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('Alamat')->nullable();
            $table->string('tipe_badan_usaha')->nullable();
            $table->string('email')->nullable();
            $table->string('nohp')->nullable();
            $table->string('tipe_toko')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('nama_direktur')->nullable();
            $table->string('nama_pic_toko')->nullable();
            $table->string('nama_apoteker')->nullable();
            $table->string('image_cv_pt')->nullable();
            $table->string('image_siup_nib')->nullable();
            $table->string('nomor_siup_nib')->nullable();
            $table->string('image_ktp')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('norek')->nullable();
            $table->string('image_buku_tabungan')->nullable();
            $table->string('image_npwp')->nullable();
            $table->string('nama_npwp')->nullable();
            $table->string('alamat_npwp')->nullable();
            $table->string('image_sia')->nullable();
            $table->string('nomor_sia')->nullable();
            $table->string('tgl_terbit_sia')->nullable();
            $table->string('tgl_kadaluarsa_sia')->nullable();
            $table->string('image_sipa')->nullable();
            $table->string('nomor_sipa')->nullable();
            $table->string('tgl_terbit_sipa')->nullable();
            $table->string('tgl_kadaluarsa_sipa')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('like')->nullable();
            $table->text('bintang')->nullable();
            $table->text('kurir')->nullable();
            $table->text('follow')->nullable();
            $table->text('facebook')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('instagram')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('status')->nullable();
            $table->text('ongkir_toko')->nullable();
            $table->text('ongkir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokos');
    }
};
