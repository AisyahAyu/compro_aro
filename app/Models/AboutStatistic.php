<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutStatistic extends Model
{
    protected $table = 'statistics';

    protected $fillable = [
    'title',
    'value',
    'suffix',
    'icon',
    'image',
    'type',
    'order',
    'is_active'
];

    protected $casts = [
        'value'     => 'integer',
        'order'     => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->orderBy('order');
    }

    public function getFormattedValueAttribute(): string
    {
        return $this->value . ($this->suffix ?? '');
    }
}