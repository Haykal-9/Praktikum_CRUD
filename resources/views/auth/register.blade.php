<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>

    @if($errors->any())
        <div style="color:red">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password</label><br>
        <input type="password" name="password"><br><br>

        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <label>Role</label><br>
        <select name="role">
            <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
        </select><br><br>

        <button type="submit">Register</button>
    </form>

    <p><a href="{{ url('/login') }}">Login</a></p>
</body>

</html>