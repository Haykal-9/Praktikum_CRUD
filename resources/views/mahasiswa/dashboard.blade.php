<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Mahasiswa Dashboard</title>
</head>

<body>
  <h1>Mahasiswa Dashboard</h1>

  @auth
    <p>Selamat datang, {{ Auth::user()->name }}</p>
    <p>Role: {{ Auth::user()->role }}</p>

    <ul>
      <li><a href="/mahasiswa">Data Mahasiswa</a></li>
      <li><a href="/matakuliah">Data Mata Kuliah</a></li>
      <li><a href="/nilai">Data Nilai</a></li>
      <li><a href="/dashboard">Dashboard Utama</a></li>
    </ul>

    <form method="POST" action="{{ url('/logout') }}">
      @csrf
      <button type="submit">Logout</button>
    </form>
  @else
    <p>Unauthorized. <a href="/login">Login</a></p>
  @endauth

</body>

</html>