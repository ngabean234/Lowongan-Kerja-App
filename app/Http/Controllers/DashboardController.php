<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', ['title' => 'dashboard']);
    }
    public function welcome(){
        return view('welcome', ['title' => 'welcome']);
    }
}


