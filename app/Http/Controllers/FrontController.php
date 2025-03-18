<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function help(){
        return view('front.help', ['title' => 'help']);
    }
    public function comunity(){
        return view('front.comunity', ['title' => 'comunity']);
    }
}
