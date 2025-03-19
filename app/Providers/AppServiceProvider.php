<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Job;
use App\Models\Company;

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
        // Share featured jobs and companies with all views
        View::composer('*', function ($view) {
            $featuredJobs = Job::with(['company', 'jobType', 'city'])
                    ->where('archived', 'N')
                    ->latest()
                    ->take(8)
                    ->get();
                    
            $featuredCompanies = Company::with(['jobs', 'city'])
                    ->where('archived', 'N')
                    ->latest()
                    ->take(8)
                    ->get();
                    
            $view->with('featuredJobs', $featuredJobs);
            $view->with('featuredCompanies', $featuredCompanies);
        });
    }
}
