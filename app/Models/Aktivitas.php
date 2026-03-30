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

    // ✅ Increment views
    public function incrementViews()
    {
        $this->increment('views');
    }
}
