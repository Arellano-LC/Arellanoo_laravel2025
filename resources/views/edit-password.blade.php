<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <!-- ✅ Bootstrap 5 CSS for responsive and styled components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Link to custom styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>

    <!-- ✅ Include navigation bar from Blade partial -->
    @include('nav')

    <!-- ✅ Toast notification for success or error feedback -->
    @if (session('success') || $errors->any())
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
            <div id="feedbackToast"
                class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0"
                role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        <!-- ✅ Show success message -->
                        @if (session('success'))
                            {{ session('success') }}
                        @else
                            <!-- ✅ Show validation errors -->
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- ✅ Close button for toast -->
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <!-- ✅ Main content container -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center fw-bold">Change Password</div>
                    <div class="card-body p-4">

                        <!-- ✅ Password update form -->
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf <!-- ✅ CSRF token for security -->

                            <!-- ✅ Old password input -->
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" id="old_password" name="old_password"
                                    class="form-control form-control-md @error('old_password') is-invalid @enderror">
                                @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ✅ New password input -->
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="form-control form-control-md @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ✅ Confirm new password input -->
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="form-control form-control-md @error('confirm_password') is-invalid @enderror">
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ✅ Submit button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-md">Update Password</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Bootstrap 5 JS for toast and other interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ Auto-show toast on page load if present -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastEl = document.getElementById('feedbackToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
                toast.show();
            }
        });
    </script>

</body>

</html>
