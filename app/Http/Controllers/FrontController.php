<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function updateprofile(Request $request){
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
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = '/storage/' . $path; // Mengupdate URL foto profil
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
