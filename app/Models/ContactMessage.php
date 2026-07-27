<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'reference_number',
        'full_name',
        'company_name',
        'email',
        'phone',
        'product_category',
        'estimated_units',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Generate nomor referensi unik saat membuat pesan baru.
     * Format: ARO-YYYY-MM-XXXX (contoh: ARO-2026-07-0001)
     */
    protected static function booted()
    {
        static::creating(function ($message) {
            $prefix = 'ARO-' . now()->format('Y-m');
            $lastMessage = static::where('reference_number', 'like', $prefix . '-%')
                ->orderByDesc('id')
                ->first();

            if ($lastMessage && preg_match('/(\d{4})$/', $lastMessage->reference_number, $matches)) {
                $nextNumber = intval($matches[1]) + 1;
            } else {
                $nextNumber = 1;
            }

            $message->reference_number = $prefix . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        });
    }
}
