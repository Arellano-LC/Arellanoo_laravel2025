<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Welcome!</a>
        </div>
    </nav>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
        <div class="mt-3">
            @if ($errors->has('email'))
                <div class="alert alert-warning text-center">
                    {{ $errors->first('email') }}
                </div>
            @else
                <div class="alert alert-warning text-danger text-center">{{ $errors->first() }}</div>
            @endif
        </div>
    @endif

    <!-- Login Form Card -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="width: 25rem; background-color: var(--secondary-color);">
            <h3 class="text-center">Login</h3>
            <form method="POST" action="{{route('login')}}">
                @csrf
                <!-- Username Field -->
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <!-- Password Field -->
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <!-- Submit Button -->
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>

            <!-- Register Link -->
            <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            <!-- Forgot Password Link -->
            <a href="{{ route('password.request') }}" class="btn btn-link text-decoration-none px-0">Forgot Password?</a>

        </div>
    </div>
</body>

</html>