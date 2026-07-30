<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'company_name',
        'description',
        'image',
        'logo',
        'logo_dark',
        'email',
        'email_desc',
        'phone',
        'phone_desc',
        'whatsapp',
        'whatsapp_desc',
        'address',
        'operational_hours',
        'social_media'
    ];

    protected $casts = [
        'social_media' => 'array',
    ];
}
