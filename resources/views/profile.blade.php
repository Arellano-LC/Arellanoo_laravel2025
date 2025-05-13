<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Optional Custom CSS -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('profile') }}">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('uploads') }}">Uploads</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container mt-4">

        <!-- Profile Edit Form -->
        <h2>Edit Profile</h2>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Profile Edit Form -->
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('POST')

            <!-- First Name Input -->
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control" required>
            </div>

            <!-- Last Name Input -->
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control" required>
            </div>

            <!-- Username Input -->
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
            </div>

            <!-- Submit Button for Profile Update -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>

        <!-- Change Password Form -->
        <h3 class="mt-5">Change Password</h3>

        <!-- Change Password Form -->
        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <!-- Current Password Input -->
            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control">
            </div>

            <!-- New Password Input -->
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control">
            </div>

            <!-- Submit Button for Password Update -->
            <button type="submit" class="btn btn-warning">Update Password</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
