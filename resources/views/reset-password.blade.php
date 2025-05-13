<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #008080, #1E90FF);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .reset-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .strength-weak {
            color: #dc3545; /* red */
        }

        .strength-medium {
            color: #ffc107; /* yellow */
        }

        .strength-strong {
            color: #28a745; /* green */
        }

        .btn-primary {
            background-color: #1E90FF;
            border-color: #1E90FF;
        }

        .btn-primary:hover {
            background-color: #1c86ee;
            border-color: #1c86ee;
        }

        /* Optional: Style the error message */
        .alert-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="reset-card">
        <h3 class="text-center mb-4">Reset Your Password</h3>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.change') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <!-- New Password input -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div id="password-strength" class="mt-1 fw-semibold"></div>
            </div>

            <!-- Confirm New Password input -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                <div id="password-match" class="mt-1 fw-semibold"></div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>
    </div>

    <script>
        // Password strength check
        const passwordInput = document.getElementById('password');
        const passwordStrengthDiv = document.getElementById('password-strength');

        passwordInput.addEventListener('input', function () {
            const passwordValue = passwordInput.value;
            const strength = getPasswordStrength(passwordValue);
            passwordStrengthDiv.textContent = strength.text;
            passwordStrengthDiv.className = 'mt-1 fw-semibold strength-' + strength.strength;
        });

        function getPasswordStrength(password) {
            const length = password.length;
            if (length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /\d/.test(password)) {
                return { text: 'Strong Password', strength: 'strong' };
            } else if (length >= 6 && /[A-Za-z]/.test(password)) {
                return { text: 'Medium Strength', strength: 'medium' };
            } else {
                return { text: 'Weak Password', strength: 'weak' };
            }
        }

        // Password match check
        const passwordConfirmation = document.getElementById('password_confirmation');
        const passwordMatchDiv = document.getElementById('password-match');

        passwordConfirmation.addEventListener('input', function () {
            if (passwordConfirmation.value === passwordInput.value) {
                passwordMatchDiv.textContent = 'Passwords match!';
                passwordMatchDiv.className = 'mt-1 fw-semibold text-success';
            } else {
                passwordMatchDiv.textContent = 'Passwords do not match!';
                passwordMatchDiv.className = 'mt-1 fw-semibold text-danger';
            }
        });
    </script>

    
</body>

</html>
