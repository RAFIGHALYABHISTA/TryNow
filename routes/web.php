<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\PaketController;
use App\Http\Controllers\User\TryoutController;
use App\Http\Controllers\User\HasilController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/paket', function () {
    return view('paket');
});
Route::get('/result', function () {
    return view('result');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/kerjakan', function () {
    return view('kerjakan');
});

// Login & Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');

    // Paket Management
    Route::resource('/admin/pakets', App\Http\Controllers\Admin\PaketController::class, ['as' => 'admin']);

    // Soal Management
    Route::resource('/admin/soals', App\Http\Controllers\Admin\SoalController::class, ['as' => 'admin']);

    // User Management
    Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::put('/admin/users/{user}/role', [App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('admin.users.updateRole');
});

// === SEMENTARA: Admin routes tanpa login (bypass auth) ===
// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
// Route::resource('/admin/pakets', App\Http\Controllers\Admin\PaketController::class, ['as' => 'admin']);
// Route::resource('/admin/soals', App\Http\Controllers\Admin\SoalController::class, ['as' => 'admin']);
// Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
// Route::put('/admin/users/{user}/role', [App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('admin.users.updateRole');


// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboard::class, 'index'])->name('user.dashboard');
    Route::get('/user/paket', [UserDashboard::class, 'paket'])->name('user.paket');
    Route::post('/user/paket/{paket}/beli', [PaketController::class, 'beli'])->name('user.paket.beli');
    Route::get('/user/kerjakan', [UserDashboard::class, 'kerjakan'])->name('user.kerjakan');
    Route::get('/user/tryout/{paket}', [TryoutController::class, 'start'])->name('user.tryout.start');
    Route::post('/user/tryout/{paket}/submit', [TryoutController::class, 'submit'])->name('user.tryout.submit');
    Route::get('/user/result', [UserDashboard::class, 'result'])->name('user.result');
    Route::get('/user/hasil/{paket}', [HasilController::class, 'show'])->name('user.hasil.show');
    Route::get('/user/profile', [UserDashboard::class, 'profile'])->name('user.profile');
    Route::put('/user/profile', [UserDashboard::class, 'updateProfile'])->name('user.profile.update');
});
