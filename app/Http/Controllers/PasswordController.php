<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;
use App\Http\Requests\UpdatePasswordRequest;

class PasswordController extends Controller
{
    // Show the password edit form
    public function edit()
    {
        return view('edit-password');
    }

    // Update the password
    public function update(UpdatePasswordRequest $request)
    {
        // Retrieve the authenticated user using auth()
        $user = auth()->user(); 

        // Ensure the user is authenticated
        if (!$user) {
            return back()->withErrors(['error' => 'You must be logged in to update your password.']);
        }

        // Check if the old password provided by the user is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Ensure the new password is different from the old password
        if ($request->old_password === $request->new_password) {
            return back()->withErrors(['new_password' => 'New password must be different from the old password.']);
        }

        // Update the user's password with the new hashed password
        $user->password = Hash::make($request->new_password);
        
        // Save the updated user record
        if ($user->save()) {
            return back()->with('success', 'Password updated successfully!');
        }

        // If save fails, return an error message
        return back()->withErrors(['error' => 'There was an issue updating the password.']);
    }
}
