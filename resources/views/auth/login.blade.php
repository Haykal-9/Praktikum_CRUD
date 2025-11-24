<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    @if($errors->has('email'))
        <div style="color:red">{{ $errors->first('email') }}</div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password</label><br>
        <input type="password" name="password"><br><br>

        <label><input type="checkbox" name="remember"> Remember me</label><br><br>

        <button type="submit">Login</button>
    </form>

    <p><a href="{{ url('/register') }}">Register</a></p>
</body>

</html>