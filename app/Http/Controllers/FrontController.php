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
    public function about(){
        return view('front.about', ['title' => 'about']);
    }
    public function contact(){
        return view('front.contact', ['title' => 'contact']);
    }
    public function profile(){
        return view('front.profile', ['title' => 'profile']);
    }
    public function editprofile(){
        return view('front.editprofile', ['title' => 'editprofile']);
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
        return view('front.help', ['title' => 'help']);
    }
    public function comunity(){
        return view('front.comunity', ['title' => 'comunity']);
    }
}
