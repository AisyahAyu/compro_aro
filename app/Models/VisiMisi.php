<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misis';

    protected $fillable = [
        'name',        // visi / misi
        'description', // isi
    ];

    public function scopeVisi($query)
    {
        return $query->where('name', 'visi');
    }

    public function scopeMisi($query)
    {
        return $query->where('name', 'misi');
    }


}