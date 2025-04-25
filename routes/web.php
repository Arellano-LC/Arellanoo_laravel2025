<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;  // Fixed missing semicolon here

// Dashboard
Route::view('/dashboard', 'dashboard')->name('dashboard');

// Login
Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Registration
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegistrationController::class, 'save'])->name('register.save');

// Profile
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');

// Admin Routes
Route::get('/admin/users', [AuthController::class, 'listUsers'])->middleware('auth')->name('admin.users');

// Admin Middleware Group
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'userList'])->name('admin.users');
});
