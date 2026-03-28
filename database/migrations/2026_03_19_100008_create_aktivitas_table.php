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
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->text('ringkasan')->nullable(); // Excerpt
            $table->longText('Deskripsi'); 

            // Media
            $table->text('gambar')->nullable(); // Foto utama

            // kategori aktivitast
            $table->enum('kategori', ['Berita', 'Pengumuman', 'Aktivitas', 'event', ])->default('Berita');
            $table->integer('active')->default(0)->comment('0=Draft, 10=Published');

            // statistik
            $table->integer('views')->default(0);

            // relasi
            $table->softDeletes();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas');
    }
};
