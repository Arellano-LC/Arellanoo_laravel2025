<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Success</title>

    <!-- Link to external CSS file for custom styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <!-- Add Bootstrap for styling and responsiveness -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Optional: Custom styles for success message */
        .success-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .success-container h4 {
            color: #28a745;
        }

        .success-container p {
            font-size: 1.1rem;
        }

        .success-container .btn {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Success message container -->
    <div class="container mt-5">
        <div class="success-container text-center">
            <!-- Success message header -->
            <h4 class="mb-3">Registration Successful!</h4>

            <!-- Display user details (username and full name) -->
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Full Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>

            <!-- Inform user to check email for account verification -->
            <p>Please check your email to verify your account before logging in.</p>

            <!-- Button to navigate to the login page -->
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Go to Login</a>
        </div>
    </div>

    <!-- Optional Bootstrap JS for functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
