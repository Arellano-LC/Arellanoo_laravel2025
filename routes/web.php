<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ReportController;


// Public Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Guest Routes (Login/Register)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', fn() => view('registration'))->name('register');
    Route::post('/register', [RegistrationController::class, 'save'])->name('register.save');
});

// Dashboard (Authenticated users)
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

// Profile Routes

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/edit-password', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/edit-password', [PasswordController::class, 'update'])->name('password.update');


// Upload Routes
Route::middleware(['custom.auth'])->group(function () {
    Route::get('/upload', [UploadController::class, 'create'])->name('upload.create');
    Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
    Route::get('/my-uploads', [UploadController::class, 'index'])->name('upload.index');
    Route::get('/download/{upload}', [UploadController::class, 'download'])->name('upload.download');
    Route::delete('/upload/{upload}', [UploadController::class, 'destroy'])->name('upload.destroy');
});
Route::redirect('/uploads', '/my-uploads');

// Email Verification Routes
Route::get('/verify-email', [EmailVerificationController::class, 'showVerificationForm'])->name('verify.email.form');
Route::post('/verify-email', [EmailVerificationController::class, 'sendVerificationEmail'])->name('verify.email.send');
Route::get('/verify-email-token/{token}', [EmailVerificationController::class, 'verifyToken'])->name('verify.email.token');

// Forgot/Reset Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.change');

// General User Management (auth protected)

Route::get('/users', [UserController::class, 'index'])->name('user.list');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');


// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Admin-only User List and Export
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/export', [AdminUserController::class, 'export'])->name('admin.users.export');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Future admin reports can be placed here...

});
Route::get('/users/export', [UserController::class, 'export'])->name('user.export');

//report route


Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');



Route::get('/users/export', [UserController::class, 'export'])->name('user.export');
