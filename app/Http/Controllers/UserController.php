<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersinfo;



use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Upload;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function index(Request $request)
{
    $currentUser = session('user');
    if (!$currentUser || $currentUser->user_type !== 'Admin') {
        abort(403, 'Access denied');
    }

    $query = Usersinfo::query();

    if ($request->filled('name')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', "%{$request->name}%")
              ->orWhere('last_name', 'like', "%{$request->name}%");
        });
    }

    if ($request->filled('email')) {
        $query->where('email', 'like', "%{$request->email}%");
    }

    $users = $query->paginate(10);

    return view('user-list', compact('users'));
}


public function destroy($id)
{
    $currentUser = Usersinfo::find(session('user_id'));

    // Only allow admin to delete users
    if (!$currentUser || $currentUser->user_type !== 'Admin') {
        abort(403, 'Access denied');
    }

    // Don't allow deleting yourself
    if ($currentUser->id == $id) {
        return back()->withErrors(['delete' => 'You cannot delete your own account.']);
    }

    $user = Usersinfo::find($id);

    if ($user) {
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    return back()->withErrors(['delete' => 'User not found.']);
}
    public function export(Request $request)
    {
        $currentUser = session('user');

        if (!$currentUser || $currentUser->user_type !== 'Admin') {
            abort(403, 'Access denied');
        }

        return Excel::download(new UsersExport($request), 'users.csv');
    }

}
