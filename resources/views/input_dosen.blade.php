@extends('layouts.app')

@section('title', 'Input Dosen')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Input Data Dosen</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="/simpan_dsn" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP</label>
                            <input type="text" name="NIP" id="NIP" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/dosen" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
