<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->role === 'company') {
            return redirect()->route('company.dashboard');
        }
        return view('company.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password) && $user->role === 'company') {
            $company = Company::where('user_id', $user->id)->first();
            
            if ($company) {
                Auth::login($user);
                return redirect()->route('company.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegisterForm()
    {
        if (Auth::check() && Auth::user()->role === 'company') {
            return redirect()->route('company.dashboard');
        }
        $cities = City::all();
        return view('company.auth.register', compact('cities'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'city_id' => 'required|exists:tbl-cities,id',
            'address' => 'required|string',
            'telephone' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'company'
        ]);

        $company = Company::create([
            'user_id' => $user->id,
            'city_id' => $request->city_id,
            'name' => $request->name,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);

        return redirect()->route('company.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}