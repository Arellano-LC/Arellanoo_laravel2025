<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Uploaded Files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional Custom CSS -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <style>
        .filter-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1rem;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="container mt-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">My Uploaded Files</h2>
            <a href="{{ route('upload.create') }}" class="btn btn-primary">Upload Files</a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Filter Form -->
        <div class="filter-card mb-4">
            <form method="GET" action="{{ route('upload.index') }}" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Filename</label>
                    <input type="text" name="filename" class="form-control"
                        value="{{ request('filename') }}" placeholder="Search by filename">
                </div>
                <div class="col-md-4">
                    <label class="form-label">File Type</label>
                    <select name="type" class="form-select">
                        <option value="">All File Types</option>
                        <option value="application/pdf" {{ request('type') == 'application/pdf' ? 'selected' : '' }}>PDF</option>
                        <option value="image/png" {{ request('type') == 'image/png' ? 'selected' : '' }}>PNG</option>
                        <option value="image/jpeg" {{ request('type') == 'image/jpeg' ? 'selected' : '' }}>JPEG</option>
                        <option value="application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                            {{ request('type') == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ? 'selected' : '' }}>
                            DOCX
                        </option>
                        <option value="text/plain" {{ request('type') == 'text/plain' ? 'selected' : '' }}>TXT</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-50">Filter</button>
                    <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary w-50">Clear</a>
                </div>
            </form>
        </div>

        <!-- Uploaded Files Table -->
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Filename</th>
                        <th>Type</th>
                        <th>Uploaded</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($uploads as $upload)
                        <tr>
                            <td>{{ $upload->original_filename }}</td>
                            <td>{{ $upload->type }}</td>
                            <td>{{ $upload->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('upload.download', $upload) }}" class="btn btn-sm btn-success me-1">Download</a>
                                <form action="{{ route('upload.destroy', $upload) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No uploaded files found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $uploads->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
