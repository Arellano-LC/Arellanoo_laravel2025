<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>

    {{-- Link to your custom CSS file --}}
    <link href="{{ asset('styles.css') }}" rel="stylesheet">

    {{-- Optional: Include Bootstrap if not already in styles.css --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
</head>

<body>
    {{-- Include navigation bar --}}
    @include('nav')

    <div class="container mt-5">
        <h2 class="mb-4">Upload a File</h2>

        {{-- Show success message if a file was uploaded successfully --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- File upload form --}}
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- File input --}}
            <div class="mb-3">
                <label for="file" class="form-label">Choose Files</label>
                <input type="file" 
                       id="file" 
                       name="file[]" 
                       class="form-control @error('file.*') is-invalid @enderror" 
                       multiple required>

                {{-- Display validation error if any --}}
                @error('file.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>
