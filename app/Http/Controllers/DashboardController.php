<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $jobs = \App\Models\Job::with(['company', 'jobType', 'city'])
            ->where('archived', 'N')
            ->latest()
            ->paginate(8);
        return view('dashboard', ['title' => 'dashboard', 'jobs' => $jobs]);
    }
    public function welcome(){
        $featuredJobs = \App\Models\Job::with(['company', 'jobType', 'city'])
                    ->where('archived', 'N')
                    ->latest()
                    ->take(8)
                    ->get();
        $featuredCompanies = \App\Models\Company::with(['jobs', 'city'])
                    ->where('archived', 'N')
                    ->latest()
                    ->take(8)
                    ->get();
        return view('welcome', ['title' => 'welcome', 'featuredJobs' => $featuredJobs, 'featuredCompanies' => $featuredCompanies]);
    }
}
