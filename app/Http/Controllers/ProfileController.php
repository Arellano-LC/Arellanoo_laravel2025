<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show the Edit Profile form
    public function edit()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to edit your profile.');
        }

        return view('profile.update', compact('user'));
    }

    // Handle the Profile Update
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username,' . Auth::id(),
        ]);

        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->username   = $request->username;
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    // Show the Profile Page
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your profile.');
        }

        return view('profile', compact('user'));

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
    
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
    
        return back()->with('success', 'Password updated!');
    }
}
