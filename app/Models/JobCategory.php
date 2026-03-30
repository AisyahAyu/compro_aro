<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi: Satu kategori punya banyak lowongan
    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class, 'job_category_id');
    }
}