<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\CompanyProfile;
use App\Models\Category;
use App\Models\Legality;
use App\Models\WorkProcess;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Platform;
use App\Models\Footer;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', true)->orderBy('order')->get();
        $companyProfile = CompanyProfile::first();
        $categories = Category::where('is_active', true)->orderBy('order')->limit(3)->get();
        $legalities = Legality::where('is_active', true)->orderBy('order')->limit(3)->get();
        $workProcesses = WorkProcess::where('is_active', true)->orderBy('step_number')->get();
        $partners = Partner::where('is_active', true)->orderBy('order')->get();
        $products = Product::where('is_active', true)->inRandomOrder()->limit(4)->get();
        $platform = Platform::where('is_active', true)->first();
        
        // Process platform URL safely
        if ($platform && $platform->platform_url) {
            $url = $platform->platform_url;
            if (is_array($url)) {
                $url = implode('', $url);
            }
            $platform->clean_url = preg_replace('/^https?:\/\//', '', $url);
        } else {
            $platform = null;
        }
        $footers = Footer::where('is_active', true)->orderBy('order')->get();

        return view('home', compact(
            'banners',
            'companyProfile',
            'categories',
            'legalities',
            'workProcesses',
            'partners',
            'products',
            'platform',
            'footers'
        ));
    }
}
