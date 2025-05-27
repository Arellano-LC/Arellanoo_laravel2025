<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <style>
        /* Password strength indicator styles */
        #password-strength {
            font-size: 0.9rem;
        }

        .strength-weak {
            color: #dc3545; 
        }

        .strength-medium {
            color: #ffc107; 
        }

        .strength-strong {
            color: #28a745; 
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 30rem;">
        <h3 class="text-center mb-4">Register</h3>
        <!-- Registration Form -->
        <form method="POST" action="{{ route('register.save') }}">
            @csrf <!-- CSRF Token for security -->

            <!-- First Name Field -->
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}">
                @error('firstname') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Last Name Field -->
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}">
                @error('lastname') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Date of Birth Field -->
            <div class="mb-3">
                <label for="bod" class="form-label">Date of Birth</label>
                <input type="date" name="bod" id="bod" class="form-control @error('bod') is-invalid @enderror" value="{{ old('bod') }}">
                @error('bod') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Sex Selection Field -->
            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label>
                <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror">
                    <option value="" disabled {{ old('sex') ? '' : 'selected' }}>Select</option>
                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('sex') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Username Field -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Password Field with Strength Indicator -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                <div id="password-strength" class="mt-1 fw-semibold"></div>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Terms and Conditions Checkbox -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }}>
                <label class="form-check-label" for="terms">I agree with the Privacy Policy and Terms</label>
                @error('terms') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Submit and Go Back Buttons -->
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <a href="{{ route('login') }}" class="btn btn-secondary w-100 mt-2">Go Back</a>
        </form>
    </div>
</div>

<!-- Optional Password Strength Script -->

</body>
</html>
