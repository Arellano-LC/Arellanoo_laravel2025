<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Optional: Custom Styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>

    <!-- Navbar -->
    {{-- The main navigation bar is included here --}}
    @include('nav')

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2>Welcome to your Dashboard</h2>
                <p class="mb-4">Manage your files and profile here.</p>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-folder2-open display-4 text-primary"></i>
                                <h5 class="card-title mt-2">My Files</h5>
                                <p class="card-text">View, upload, and organize your files.</p>
                                <a href="{{ route('upload.index') }}" class="btn btn-outline-primary">Go to Files</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-person-circle display-4 text-success"></i>
                                <h5 class="card-title mt-2">Profile</h5>
                                <p class="card-text">Update your personal information and settings.</p>
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-success">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-key display-4 text-warning"></i>
                                <h5 class="card-title mt-2">Change Password</h5>
                                <p class="card-text">Update your account password securely.</p>
                                <a href="{{ route('password.edit') }}" class="btn btn-outline-warning">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
