<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TUGAS')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table td,
        .table th {
            padding: 0.5rem;
            vertical-align: middle;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            @php $role = Auth::user()->role ?? 'guest'; @endphp
            <a class="navbar-brand" href="/">
                @if($role === 'admin')
                    Admin Panel
                @elseif($role === 'dosen')
                    Dosen Panel
                @elseif($role === 'mahasiswa')
                    Mahasiswa Panel
                @else
                    Home
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a></li>
                    @if($role === 'admin')
                        <li class="nav-item"><a class="nav-link {{ request()->is('prodi*') ? 'active' : '' }}" href="/prodi">Prodi</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('dosen*') ? 'active' : '' }}" href="/dosen">Dosen</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link {{ request()->is('mahasiswa*') ? 'active' : '' }}" href="/mahasiswa">Mahasiswa</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('matakuliah*') ? 'active' : '' }}" href="/matakuliah">Mata Kuliah</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('nilai*') ? 'active' : '' }}" href="/nilai">Nilai</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm mt-1">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        @if(Auth::check())
            <h2>{{ ucfirst($role) }} Dashboard</h2>
        @endif
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>