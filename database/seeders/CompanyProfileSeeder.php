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
                'company_name' => 'PT. ARO Baskara Esa',
                'description' => 'PT ARO Baskara Esa berkomitmen menjadi mitra pengadaan yang andal bagi sektor swasta dan instansi pemerintah. Dengan mengutamakan integritas, efisiensi, dan kepatuhan terhadap regulasi, kami menghadirkan solusi pengadaan yang dirancang sesuai kebutuhan spesifik setiap mitra.',
                'image' => 'uploads/tentangperusahaan.png',
                'logo' => 'uploads/1773390371_logo.png',
                'logo_dark' => 'uploads/1773631215_logo_dark.png',
                'email' => 'arobaskara@gmail.com',
                'phone' => '(021) 38835187',
                'whatsapp' => '6282288886009',
                'address' => "Jl. TM. Slamet Riyadi Raya No. 9 RT.1 RW.4\nKb. Manggis, Kec. Matraman\nDaerah Khusus Ibukota Jakarta\n13150",
                'operational_hours' => "Senin-Jumat\n08.00 - 17.00\nSabtu\n08.00 - 12.00\nMinggu & Hari Libur\nTutup",
                'social_media' => [
                    'facebook' => '',
                    'twitter' => '',
                    'instagram' => '',
                    'linkedin' => ''
                ]
            ]
        );
    }
}
