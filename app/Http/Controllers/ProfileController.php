<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersinfo;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function edit()
    {
        return view('edit-profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->save();
    
            session(['user' => $user]);
    
            return back()->with('success', 'Profile updated successfully!');
        }
    
        return back()->withErrors(['user' => 'User not found.']);
    }
}

