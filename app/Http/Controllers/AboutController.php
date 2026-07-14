<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\CompanyProfile;
use App\Models\AboutStatistic;
use App\Models\VisiMisi;
use App\Models\Brand;
use App\Models\Partner;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\ContactSection;

class AboutController extends Controller
{
    public function index()
    {
        // Section 13 — Banner halaman tentang
        $banner = Banner::where('is_active', true)
            ->where('page_type', 'about')
            ->orderBy('order')
            ->first();

        // Section 14 — Deskripsi perusahaan
        $company = CompanyProfile::first();

        // Section 15 — Statistik
        $statistics = AboutStatistic::active()->latest()->get();

        // Section 16 — Visi & Misi
        $visi = VisiMisi::where('name', 'visi')->first();
        $misi = VisiMisi::where('name', 'misi')->get();

        // Section 17 — Brand
        $brands = Brand::active()->get();

        // Section 18 — Mitra Teknologi (pakai tabel partners yang sudah ada)
        $partners = Partner::where('is_active', true)
                           ->orderBy('order')
                           ->get();

        // Section 19 — Tim
        $team = TeamMember::active()->get();

        $contact = ContactSection::where('is_active', true)->first();

        return view('about.index', compact(
            'banner',
            'company',
            'statistics',
            'visi',
            'misi',
            'brands',
            'partners',
            'team',
            'contact'
        ));
    }
}