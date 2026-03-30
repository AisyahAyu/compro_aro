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
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            
            // Menggunakan string untuk path gambar/icon
            $table->string('icon')->nullable(); 
            
            // Tambahkan 'order' untuk mengatur urutan kartu di landing page
            $table->integer('order')->default(0); 
            
            // Tambahkan 'status' agar kamu bisa menyembunyikan benefit tanpa menghapusnya
            $table->enum('status', ['active', 'inactive'])->default('active');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits');
    }
};