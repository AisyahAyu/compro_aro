<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'icon',
        'order',
        'status',
    ];

    /**
     * Scope a query to only include active benefits.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active')->orderBy('order', 'asc');
    }
}