<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;




// Page Routes
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');




Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegistrationController:: class, 'save'])->name('register.save');

