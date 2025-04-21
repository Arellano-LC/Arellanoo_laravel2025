<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 30rem;">
        <h3 class="text-center text-success mb-3">🎉 Registration Successful</h3>

        <ul class="list-group list-group-flush">
            @foreach ($data as $key => $value)
                <li class="list-group-item">
                    <strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong>
                    {{ is_bool($value) ? ($value ? 'Yes' : 'No') : $value }}
                </li>
            @endforeach
        </ul>

        <div class="mt-4 text-center">
            <a href="{{ url('login') }}" class="btn btn-primary">Go to Login</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
