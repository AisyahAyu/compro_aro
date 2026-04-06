<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingEvent extends Model
{
    use HasFactory;

    // Pastikan SEMUA kolom ini ada di dalam array fillable
    protected $fillable = [
        'title',
        'slug',
        'description', // Pastikan ini ADA
        'image',
        'event_date',
        'location',
        'start_time',
        'category',
        'is_published',
    ];

    // Jika kamu ingin field event_date otomatis menjadi objek Carbon
    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean',
    ];
}