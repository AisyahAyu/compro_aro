<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

// Update Helper URL di Model Aktivitas
public function getGambarUrlAttribute()
{
    if (empty($this->gambar)) {
        return asset('images/no-image.png');
    }

    // Pastikan path mengarah ke file asli di disk 'public'
    if (Storage::disk('public')->exists($this->gambar)) {
        return Storage::url($this->gambar);
    }

    // Fallback jika gambar lama hanya berupa nama file di folder aktivitas
    return asset('storage/aktivitas/' . $this->gambar);
}

    // ✅ Increment views
    public function incrementViews()
    {
        $this->increment('views');
    }
}
