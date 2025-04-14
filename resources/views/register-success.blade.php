<!-- resources/views/register-success.blade.php -->
<h2>Registration Successful</h2>
<ul>
    @foreach ($data as $key => $value)
        <li><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ is_bool($value) ? ($value ? 'Yes' : 'No') : $value }}</li>
    @endforeach
</ul>
