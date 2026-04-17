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
    $banners = Banner::orderBy('order')->get();
    $benefits = Benefits::where('status', 'active')->orderBy('order', 'asc')->get();
    $jobCategories = JobCategory::all();

    $selectedCategory = $request->input('category', '');

    $query = JobVacancy::where('status', 'Active')->latest();

    // SEARCH
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }

    // FILTER
    if ($request->filled('category')) {
        $query->where('job_category_id', $request->category);
    }

    // WAJIB PAGINATION
    $vacancies = $query->paginate(4)->withQueryString();

    // AJAX → RETURN HTML
    if ($request->expectsJson() || $request->ajax()) {
        return view('partials.job_card_list', compact('vacancies'))->render();
    }

    return view('career', compact(
        'banners',
        'benefits',
        'jobCategories',
        'vacancies',
        'selectedCategory'
    ));
}
}