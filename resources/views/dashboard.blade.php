<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>
    <div class="header-nav" style="margin-bottom:15px;">
        <a href="/dashboard" class="btn btn-primary btn-sm">Dashboard</a>
        <a href="/matakuliah" class="btn btn-secondary btn-sm ml-2">Mata Kuliah</a>
    </div>

    @auth
        <p>Halo, {{ Auth::user()->name }} (role: {{ Auth::user()->role }})</p>

        {{-- Menu untuk ADMIN --}}
        @if(Auth::user()->role === 'admin')
            <h3>Menu Admin</h3>
            <ul>
                <li><a href="/dosen">Kelola Data Dosen</a></li>
                <li><a href="/mahasiswa">Kelola Data Mahasiswa</a></li>
                <li><a href="/prodi">Kelola Data Prodi</a></li>
                <li><a href="/matakuliah">Kelola Data Mata Kuliah</a></li>
                <li><a href="/nilai">Kelola Data Nilai</a></li>
            </ul>

            {{-- Menu untuk DOSEN --}}
        @elseif(Auth::user()->role === 'dosen')
            <h3>Menu Dosen</h3>
            <ul>
                <li><a href="/mahasiswa">Data Mahasiswa</a> (Read Only)</li>
                <li><a href="/matakuliah">Data Mata Kuliah</a> (Read Only)</li>
                <li><a href="/nilai">Kelola Data Nilai</a></li>
            </ul>

            {{-- Menu untuk MAHASISWA --}}
        @elseif(Auth::user()->role === 'mahasiswa')
            <h3>Menu Mahasiswa</h3>
            <ul>
                <li><a href="/mahasiswa">Data Diri</a></li>
                <li><a href="/nilai">Lihat Nilai</a></li>
                <li><a href="/matakuliah">Lihat Mata Kuliah</a></li>
            </ul>

        @else
            <p>Role tidak dikenali.</p>
        @endif

        <form method="POST" action="{{ url('/logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <p>Kamu belum login. <a href="/login">Login</a></p>
    @endauth

</body>

</html>