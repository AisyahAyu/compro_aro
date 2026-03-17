<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'section',
        'content',
        'links',
        'order',
        'is_active'
    ];

    protected $casts = [
        'links' => 'array',
        'is_active' => 'boolean',
    ];
}
