
<h2>Login Page</h2>

<form method="POST" action="/login">
    @csrf
    <label>Username: <input type="text" name="username"></label><br>
    <label>Password: <input type="password" name="password"></label><br>
    <button type="submit">Login</button>
</form>

@if ($errors->any())
    <p style="color:red;">{{ $errors->first() }}</p>
@endif
