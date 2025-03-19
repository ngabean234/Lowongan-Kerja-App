<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\City;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'company') {
                return redirect()->route('login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $jobs = Job::where('company_id', $company->id)->get();
        
        return view('company.dashboard.index', compact('company', 'jobs'));
    }

    public function profile()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $cities = City::all();
        return view('company.dashboard.profile', compact('company', 'cities'));
    }

    public function updateProfile(Request $request)
    {
        $company = Company::where('user_id', Auth::id())->first();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'address' => 'required|string',
            'city_id' => 'required|exists:tbl-cities,id',
            'company_icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('company_icon')) {
            $icon = $request->file('company_icon');
            $iconName = time() . '_icon.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('company'), $iconName);
            $data['company_icon'] = $iconName;
        }

        if ($request->hasFile('company_logo')) {
            $logo = $request->file('company_logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('company'), $logoName);
            $data['company_logo'] = $logoName;
        }

        $data['update_id'] = Auth::id();
        $company->update($data);

        return redirect()->route('company.dashboard');
    }
}