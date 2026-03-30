<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'job_applications';

    // Kolom yang boleh diisi (Mass Assignment)
    // Sesuaikan persis dengan kolom di Migration tadi
    protected $fillable = [
        'job_vacancy_id',
        'full_name',
        'email',
        'phone_number',
        'last_education',
        'years_of_experience',
        'previous_job',
        'linkedin_url',
        'cover_letter',
        'resume_path',
        'status'
    ];

    /**
     * Relasi: Satu lamaran dimiliki oleh satu lowongan kerja.
     */
    public function job_vacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }
}