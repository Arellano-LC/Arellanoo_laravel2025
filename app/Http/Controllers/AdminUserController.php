<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminUserController extends Controller
{
    // Protect this controller with admin middleware
    public function __construct()
    {
        $this->middleware('admin'); // We'll create this middleware in Step 4
    }

    // Show filtered user list
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->filled('name')) {
            $users->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$request->name}%"]);
        }

        if ($request->filled('email')) {
            $users->where('email', 'like', "%{$request->email}%");
        }

        $users = $users->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    // Export filtered users to CSV
    public function export(Request $request): StreamedResponse
    {
        $users = User::query();

        if ($request->filled('name')) {
            $users->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$request->name}%"]);
        }

        if ($request->filled('email')) {
            $users->where('email', 'like', "%{$request->email}%");
        }

        $users = $users->get();

        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=users.csv",
        ];

        $columns = ['Name', 'Email', 'Username', 'Role'];

        $callback = function () use ($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $user) {
                fputcsv($file, [
                    "{$user->first_name} {$user->last_name}",
                    $user->email,
                    $user->username,
                    $user->user_type,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Optional: Admin delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'User deleted successfully.');
    }
}
