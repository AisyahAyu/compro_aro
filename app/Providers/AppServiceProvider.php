<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CompanyProfile;
use Illuminate\Support\Str;
use App\Helpers\LogoHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share company profile with all views
        if (\Illuminate\Support\Facades\Schema::hasTable('company_profiles')) {
            View::share('companyProfile', CompanyProfile::first());
        }
        
        // Share footer settings with all views
        if (\Illuminate\Support\Facades\Schema::hasTable('footer_settings')) {
            View::share('footerSettings', \App\Models\FooterSetting::getSettings());
        }

        // Share active categories with navbar view composer
        View::composer('partials.navbar', function ($view) {
            if (\Illuminate\Support\Facades\Schema::hasTable('categories')) {
                $categories = \App\Models\Category::where('is_active', true)
                    ->orderBy('order', 'asc')
                    ->get();
                $view->with('navbarCategories', $categories);
            }
        });
        
        // Include LogoHelper functions
        require_once app_path('Helpers/LogoHelper.php');
        
        // Add custom helper for cleaning URLs
        Str::macro('cleanUrl', function ($url) {
            if (!$url) return '';
            
            // Remove protocol and www
            $clean = $url;
            $patterns = ['https://www.', 'http://www.', 'https://', 'http://'];
            foreach ($patterns as $pattern) {
                if (str_starts_with($clean, $pattern)) {
                    $clean = substr($clean, strlen($pattern));
                    break;
                }
            }
            
            // Remove trailing slash
            $clean = rtrim($clean, '/');
            
            return $clean;
        });
        
        // Add helper for clean URL display
        Str::macro('cleanUrlDisplay', function ($url) {
            if (is_array($url)) {
                return '';
            }
            
            if (!$url) {
                return '';
            }
            
            // Remove protocol and www
            $clean = $url;
            $patterns = ['https://www.', 'http://www.', 'https://', 'http://'];
            foreach ($patterns as $pattern) {
                if (str_starts_with($clean, $pattern)) {
                    $clean = substr($clean, strlen($pattern));
                    break;
                }
            }
            
            // Remove trailing slash
            $clean = rtrim($clean, '/');
            
            return $clean;
        });
    }
}
