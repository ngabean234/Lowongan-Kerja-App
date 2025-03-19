<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CompanyAuthController;
use App\Http\Controllers\CompanyDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//DashboardController
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/welcome', [DashboardController::class, 'welcome'])->name('welcome');

//FrontController
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/profile', [FrontController::class, 'profile'])->name('front.profile');
Route::get('/editprofile', [FrontController::class, 'editprofile'])->name('front.editprofile');
Route::put('/updateprofile', [FrontController::class, 'updateprofile'])->name('front.updateprofile');
Route::get('/help', [FrontController::class, 'help'])->name('front.help');
Route::get('/comunity', [FrontController::class, 'comunity'])->name('front.comunity');

//AuthController
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Company Auth Routes
Route::get('/company/login', [CompanyAuthController::class, 'showLoginForm'])->name('company.login');
Route::post('/company/login', [CompanyAuthController::class, 'login']);
Route::get('/company/register', [CompanyAuthController::class, 'showRegisterForm'])->name('company.register');
Route::post('/company/register', [CompanyAuthController::class, 'register']);
Route::post('/company/logout', [CompanyAuthController::class, 'logout'])->name('company.logout');

// Company Dashboard Routes
Route::middleware(['auth', 'role:company'])->group(function () {
    Route::get('/company/dashboard', [CompanyDashboardController::class, 'index'])->name('company.dashboard');
    Route::get('/company/profile', [CompanyDashboardController::class, 'profile'])->name('company.profile');
    Route::put('/company/profile', [CompanyDashboardController::class, 'updateProfile'])->name('company.profile.update');
    Route::resource('jobs', JobController::class);
    Route::put('/jobs/{job}/archive', [JobController::class, 'archive'])->name('jobs.archive');
    Route::put('/jobs/{job}/unarchive', [JobController::class, 'unarchive'])->name('jobs.unarchive');
});

// Public Job Routes
Route::get('/search-jobs', [JobController::class, 'search'])->name('search.jobs');
