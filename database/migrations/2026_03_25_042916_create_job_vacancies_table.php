<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['full_time', 'part_time', 'internship', 'freelance']);
            $table->string('experience')->nullable();
            
            // Kolom Tambahan untuk Gaji
            $table->bigInteger('salary')->nullable();

            $table->longText('description');
            $table->longText('responsibility');
            $table->longText('qualification');
            $table->string('location');

            // Relasi ke category (Pastikan job_categories sudah dimigrasi duluan)
            $table->foreignId('job_category_id')->constrained('job_categories')->cascadeOnDelete();

            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};