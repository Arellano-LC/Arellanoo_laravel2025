<form action="{{ route('admin.users.export') }}" method="GET" class="d-inline">
    <!-- Hidden inputs for filtering values -->
    <input type="hidden" name="name" value="{{ request('name') }}">
    <input type="hidden" name="email" value="{{ request('email') }}">

    <button type="submit" class="btn btn-outline-success btn-sm shadow-sm px-3 py-2 rounded">
        <i class="bi bi-download me-1"></i> Download CSV
    </button>
</form>
