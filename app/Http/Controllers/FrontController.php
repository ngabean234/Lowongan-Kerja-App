<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class FrontController
 * @package App\Http\Controllers
 */
class FrontController extends Controller
{
    /**
     * Get featured jobs and companies for views
     *
     * @return array
     */
    private function getFeaturedData()
    {
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
                    
        return [
            'featuredJobs' => $featuredJobs,
            'featuredCompanies' => $featuredCompanies
        ];
    }

    public function about(){
        $data = $this->getFeaturedData();
        return view('front.about', array_merge(['title' => 'about'], $data));
    }
    public function contact(){
        $data = $this->getFeaturedData();
        return view('front.contact', array_merge(['title' => 'contact'], $data));
    }
    public function profile(){
        $data = $this->getFeaturedData();
        return view('front.profile', array_merge(['title' => 'profile'], $data));
    }
    public function editprofile(){
        $data = $this->getFeaturedData();
        return view('front.editprofile', array_merge(['title' => 'editprofile'], $data));
    }
    public function updateProfile(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto
    ]);

    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;

    // Jika ada foto profil yang diunggah
    if ($request->hasFile('profile_photo')) {
        // Hapus foto lama jika ada
        if ($user->profile_photo && file_exists(public_path('profiles/' . basename($user->profile_photo)))) {
            unlink(public_path('profiles/' . basename($user->profile_photo)));
        }

        // Simpan foto baru ke direktori public/profiles
        $photo = $request->file('profile_photo');
        $photoName = time() . '_' . $user->id . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('profiles'), $photoName);

        // Update path di database
        $user->profile_photo = 'profiles/' . $photoName;
    }

    $user->save(); // Simpan perubahan

    // Redirect kembali ke halaman profil dengan pesan sukses
    return redirect()->route('front.profile')->with('success', 'Profil Anda berhasil diperbarui!');
}
    public function help(){
        $data = $this->getFeaturedData();
        return view('front.help', array_merge(['title' => 'help'], $data));
    }
    public function comunity(){
        $data = $this->getFeaturedData();
        return view('front.comunity', array_merge(['title' => 'comunity'], $data));
    }
}
