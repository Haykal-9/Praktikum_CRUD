@extends('layouts.app')

@section('title', 'Edit Program Studi')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Program Studi</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ url('/update_prodi/' . $prodi->id_prodi) }}" method="POST">

                @csrf
                <div class="mb-3">
                    <label for="id_prodi" class="form-label">Kode Prodi</label>
                    <input type="text" name="id_prodi" id="id_prodi" class="form-control"
                        value="{{ $prodi->id_prodi }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_prodi" class="form-label">Nama Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control"
                        value="{{ $prodi->nama_prodi }}" required>
                </div>

                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control"
                        value="{{ $prodi->fakultas }}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/prodi" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
