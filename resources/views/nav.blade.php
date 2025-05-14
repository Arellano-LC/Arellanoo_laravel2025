<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Custom CSS Variables for Color Palette */
        :root {
            --primary-color: #E3FDFD;
            /* Light teal background color */
            --secondary-color: #CBF1F5;
            /* Light blue for cards */
            --accent-color: #A6E3E9;
            /* Accent color for buttons */
            --dark-accent: #71C9CE;
            /* Darker teal for navbar */
            --text-dark: #333;
            /* Dark text color */
            --text-light: #fff;
            /* Light text color */
        }

        /* Global Styles */
        body {
            background-color: var(--primary-color);
            /* Background color of the page */
            color: var(--text-dark);
            /* Text color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Font style */
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--dark-accent);
            /* Dark teal background for navbar */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for navbar */
        }

        .navbar-brand,
        .nav-link {
            color: var(--text-light) !important;
            /* White text for navbar items */
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--accent-color);
            /* Button background color */
            border-color: var(--dark-accent);
            /* Button border color */
            transition: 0.3s ease;
            /* Smooth transition for hover effect */
            color: var(--text-dark);
            /* Button text color */
        }

        .btn-primary:hover {
            background-color: var(--dark-accent);
            /* Darker button color on hover */
            color: var(--text-light);
            /* White text color on hover */
        }

        /* Card Styling */
        .card {
            background-color: var(--secondary-color);
            /* Card background color */
            border: none;
            /* Remove card border */
            border-radius: 1rem;
            /* Rounded corners for cards */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
            /* Soft shadow around the card */
        }

        /* Input Fields Styling */
        input.form-control,
        select.form-select {
            border-radius: 0.5rem;
            /* Rounded borders for input and select fields */
            border: 1px solid #ccc;
            /* Light gray border for input fields */
        }

        input.form-control:focus,
        select.form-select:focus {
            border-color: var(--dark-accent);
            /* Focused input border color */
            box-shadow: 0 0 0 0.2rem rgba(113, 201, 206, 0.25);
            /* Focused shadow effect */
        }

        /* Utility Classes */
        .text-center {
            text-align: center;
            /* Center text alignment */
        }

        .vh-100 {
            height: 100vh;
            /* Full viewport height */
        }

        /* Footer or Small Text */
        .small-text {
            font-size: 0.875rem;
            /* Smaller text size */
            color: #666;
            /* Subtle text color */
        }

        /* Responsive Fix for Small Screens */
        @media (max-width: 576px) {
            .card {
                width: 100% !important;
                /* Full-width card on small screens */
                padding: 1rem;
                /* Padding inside the card */
            }

            .navbar-brand {
                font-size: 1.25rem;
                /* Adjust navbar brand size on small screens */
            }
        }
    </style>
    <!-- Link to Bootstrap CSS for responsiveness and styling -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar with navigation links -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- Link to the dashboard page -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
            <!-- Navbar toggler for smaller screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto">
                    <!-- Link to uploaded files page -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('upload.index') }}">Uploaded Files</a></li>
                    <!-- Link to profile editing page -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                    <!-- Link to change password page -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('password.edit') }}">Change Password</a>
                    </li>
                    <!-- Show this link if the user is an admin -->
                    @if (session('user') && session('user')->user_type === 'Admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}">Users</a></li>
                    @endif
                    @if (session('user') && session('user')->user_type === 'Admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.reports') }}">Reports</a></li>
                    @endif
                </ul>
            </div>
            <!-- Logout Button -->
            <div class="d-flex">
                <a class="btn logout-btn" href="{{ route('login') }}">Logout</a>
            </div>
        </div>
    </nav>

</body>

</html>
