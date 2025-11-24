<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TUGAS')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table td, .table th {
            padding: 0.5rem;
            vertical-align: middle;
        }
        .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            margin: 0 0.25rem;
        }
        .container-fluid {
            padding: 1rem;
        }
        .navbar {
            margin-bottom: 1rem;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prodi*') ? 'active' : '' }}" href="/prodi">Prodi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mahasiswa*') ? 'active' : '' }}" href="/mahasiswa">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dosen*') ? 'active' : '' }}" href="/dosen">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('matakuliah*') ? 'active' : '' }}" href="/matakuliah">Mata Kuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('nilai*') ? 'active' : '' }}" href="/nilai">Nilai</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
