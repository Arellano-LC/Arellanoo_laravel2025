<?php

use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
});

// Show login form
Route::get('/login', function () {
    return view('login');
});

// Handle login logic
Route::post('/login', function (\Illuminate\Http\Request $request) {
    $correctUsername = 'admin';
    $correctPassword = 'password123';

    if ($request->username === $correctUsername && $request->password === $correctPassword) {
        return redirect('/dashboard');
    } else {
        return back()->withErrors(['Invalid credentials']);
    }
});
// Show registration form
Route::get('/register', function () {
    return view('register');
});

// Handle form submission
Route::post('/register', function (\Illuminate\Http\Request $request) {
    $data = $request->except('password'); // hide password
    return view('register-success', ['data' => $data]);
});
