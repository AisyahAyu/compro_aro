<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'PT. Solusi Bisnis Indonesia',
                'description' => 'Kami adalah perusahaan yang berkomitmen untuk memberikan solusi terbaik untuk kebutuhan bisnis Anda. Dengan pengalaman lebih dari 10 tahun, kami telah membantu ratusan perusahaan dan instansi untuk meningkatkan efisiensi operasional mereka.',
                'image' => 'uploads/company-image.jpg',
                'logo' => 'uploads/company-logo.png',
                'email' => 'info@solusibisnis.com',
                'phone' => '+62 21 1234 5678',
                'address' => 'Jl. Sudirman No. 123, Jakarta Pusat, Indonesia',
                'operational_hours' => "Senin-Jumat\n08.00 - 17.00\nSabtu\n08.00 - 12.00\nMinggu & Hari Libur\nTutup",
                'social_media' => [
                    'facebook' => 'https://facebook.com/solusibisnis',
                    'twitter' => 'https://twitter.com/solusibisnis',
                    'instagram' => 'https://instagram.com/solusibisnis',
                    'linkedin' => 'https://linkedin.com/company/solusibisnis'
                ]
            ]
        );
    }
}
