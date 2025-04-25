<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userList(Request $request)
    {
        // Initialize the query on the User model
        $query = User::query();

        // Check if 'name' is present in the request
        if ($request->filled('name')) {
            $query->where('first_name', 'like', '%' . $request->name . '%');
        }

        // Check if 'email' is present in the request
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // Paginate the results (10 per page)
        $users = $query->paginate(10);

        // Return the view with users data
        return view('admin.users', compact('users'));
    }
}
