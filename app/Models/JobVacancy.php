<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'type', 
        'experience', 
        'salary',
        'description', 
        'responsibility', 
        'qualification', 
        'location', 
        'job_category_id', 
        'status'
    ];

    // Relasi: Satu lowongan dimiliki oleh satu kategori
    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
    /**
     * Relasi: Satu lowongan bisa memiliki banyak lamaran.
     */
    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'job_vacancy_id');
}
}