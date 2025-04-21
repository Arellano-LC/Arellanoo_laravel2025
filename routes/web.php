<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/db-test', function () {
    return DB::select('SHOW TABLES');
});


// Page Routes
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

// Registration Handler
Route::post('/register', function (Request $request) {
    $data = $request->except('password'); // exclude password from display
    return view('register-success', ['data' => $data]);
})->name('register.submit');

// Login Handler
Route::post('/login', function (Request $request) {
    $correctUsername = 'admin';
    $correctPassword = 'password123';

    if ($request->username === $correctUsername && $request->password === $correctPassword) {
        return redirect('/dashboard');
    } else {
        return back()->withErrors(['Invalid credentials']);
    }
})->name('login.submit');
