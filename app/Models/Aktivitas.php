<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table = 'aktivitas';

    protected $fillable = [
        'judul',
        'ringkasan',
        'Deskripsi',
        'gambar',
        'kategori',
        'active',
        'views'
    ];

    protected $casts = [
        'views' => 'integer',
        'active' => 'integer',
    ];

    // ✅ Status Constants
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 10;

    // ✅ Kategori Constants
    const KATEGORI = [
        'Berita',
        'Pengumuman',
        'Aktivitas',
        'Event'
    ];

    // ✅ Scope: Published
    public function scopePublished($query)
    {
        return $query->where('active', self::STATUS_PUBLISHED);
    }

    // ✅ Helper: cek published
    public function isPublished()
    {
        return $this->active === self::STATUS_PUBLISHED;
    }

    // ✅ Helper: Safe Image URL
    public function getGambarUrlAttribute()
    {
        if (empty($this->gambar) || $this->gambar === '0' || $this->gambar === 0) {
            return asset('images/no-image.png');
        }

        // If it already contains the folder prefix, just return it
        if (str_starts_with($this->gambar, 'aktivitas/')) {
            return asset('storage/' . $this->gambar);
        }

        // Otherwise, prepend the folder
        return asset('storage/aktivitas/' . $this->gambar);
    }

    // ✅ Increment views
    public function incrementViews()
    {
        $this->increment('views');
    }
}
