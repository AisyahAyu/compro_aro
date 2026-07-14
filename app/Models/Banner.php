<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
        'order',
        'is_active',
        'page_type'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
