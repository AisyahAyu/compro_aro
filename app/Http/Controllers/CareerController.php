<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobVacancy;
use App\Models\JobCategory;
use App\Models\Banner;
use App\Models\Benefits;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil Banner, Benefit, dan Kategori
        $banners = Banner::orderBy('order')->get();
        $benefits = Benefits::where('status', 'active')->orderBy('order', 'asc')->get();
        $jobCategories = JobCategory::all();

        // 2. Query Lowongan Pekerjaan Aktif
        $query = JobVacancy::where('status', 'Active');

        // Logic Search (disesuaikan dengan key 'q' dari script AJAX)
// Logic Search - Ubah dari 'q' menjadi 'search'
        if ($request->filled('search')) {
            $search = $request->search; // Ambil dari name="search"
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Logic Filter Kategori (Update: Menggunakan has & array_filter)
        if ($request->has('category')) {
            // Kita bungkus ke array dan bersihkan dari nilai kosong/null
            $categoryIds = array_filter((array)$request->category);

            // Jika array tidak kosong (berarti user pilih kategori spesifik), jalankan filter
            if (!empty($categoryIds)) {
                $query->whereIn('job_category_id', $categoryIds);
            }
            // Jika array kosong (user pilih 'Semua Departemen'), filter whereIn akan dilewati 
            // sehingga semua data 'Active' akan tampil.
        }

        $vacancies = $query->latest()->paginate(4)->withQueryString();

        // 3. HANDLE AJAX RESPONSE
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.job_card_list', compact('vacancies'))->render()
            ]);
        }

        // 4. Return View Normal
        return view('career', compact('banners', 'benefits', 'jobCategories', 'vacancies'));
    }
}