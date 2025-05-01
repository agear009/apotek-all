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
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('Alamat')->nullable();
            $table->string('googlemap')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('like')->nullable();
            $table->text('bintang')->nullable();
            $table->text('sales')->nullable();
            $table->text('follow')->nullable();
            $table->text('facebook')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('instagram')->nullable();
            $table->text('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};
