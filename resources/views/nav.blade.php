

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        :root {
        --primary-color: #E3FDFD;
        --secondary-color: #CBF1F5;
        --accent-color: #A6E3E9;
        --dark-accent: #71C9CE;
        --text-dark: #333;
        --text-light: #fff;
    }
    
    body {
        background-color: var(--primary-color);
        color: var(--text-dark);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Navbar */
    .navbar {
        background-color: var(--dark-accent);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand, .nav-link {
        color: var(--text-light) !important;
    }
    
    /* Button Styles */
    .btn-primary {
        background-color: var(--accent-color);
        border-color: var(--dark-accent);
        transition: 0.3s ease;
        color: var(--text-dark);
    }
    
    .btn-primary:hover {
        background-color: var(--dark-accent);
        color: var(--text-light);
    }
    
    /* Card Styling */
    .card {
        background-color: var(--secondary-color);
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
    }
    
    /* Input Fields */
    input.form-control, select.form-select {
        border-radius: 0.5rem;
        border: 1px solid #ccc;
    }
    
    input.form-control:focus, select.form-select:focus {
        border-color: var(--dark-accent);
        box-shadow: 0 0 0 0.2rem rgba(113, 201, 206, 0.25);
    }
    
    /* Utility Classes */
    .text-center {
        text-align: center;
    }
    
    .vh-100 {
        height: 100vh;
    }
    
    /* Footer or Small Text */
    .small-text {
        font-size: 0.875rem;
        color: #666;
    }
    
    /* Responsive Fix for Small Screens */
    @media (max-width: 576px) {
        .card {
            width: 100% !important;
            padding: 1rem;
        }
    
        .navbar-brand {
            font-size: 1.25rem;
        }
    }
    
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto">
    
                    <li class="nav-item"><a class="nav-link" href="{{ route('upload.index') }}">Uploaded Files</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('password.edit') }}">Change Password</a></li>
                    @if(session('user') && session('user')->user_type === 'Admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}">Users</a></li>
                    @endif
                </ul>
            </div>
            <div class="d-flex">
                <a class="btn logout-btn" href="{{ route('login') }}">Logout</a>
            </div>
        </div>
    </nav>
    
</body>
</html>




