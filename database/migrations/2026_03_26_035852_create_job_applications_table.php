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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            
            // Foreign Key ke tabel job_vacancies
            $table->foreignId('job_vacancy_id')->constrained('job_vacancies')->onDelete('cascade');
            
            // Data Pribadi Pelamar
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('last_education');
            $table->integer('years_of_experience');
            $table->string('previous_job')->nullable(); // Bisa kosong jika Fresh Graduate
            $table->string('linkedin_url')->nullable();
            
            // Dokumen
            $table->text('cover_letter')->nullable();
            $table->string('resume_path'); // Tempat menyimpan nama file PDF CV
            
            // Status Lamaran (Default: pending)
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};