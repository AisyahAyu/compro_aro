<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLink extends Model
{
    protected $fillable = [
        'marketplace_url',
        'inaproc_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
