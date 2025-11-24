@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Data Mata Kuliah</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow-sm">
        <div class="card-body">
            <form action="/update_matakuliah/{{ $matakuliah->id_mk }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_mk" class="form-label">Kode MK</label>
                    <input type="text" name="id_mk" id="id_mk" class="form-control" value="{{ $matakuliah->id_mk }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_mk" class="form-label">Nama MK</label>
                    <input type="text" name="nama_mk" id="nama_mk" class="form-control" value="{{ $matakuliah->nama_mk }}" required>
                </div>
                <div class="mb-3">
                    <label for="sks" class="form-label">SKS</label>
                    <input type="number" name="sks" id="sks" class="form-control" value="{{ $matakuliah->sks }}" required>
                </div>
                <div class="mb-3">
                    <label for="NIP" class="form-label">Dosen</label>
                    <select name="NIP" id="NIP" class="form-select" required>
                        <option value="">Pilih Dosen</option>
                        @foreach ($dosen as $d)
                            <option value="{{ $d->NIP }}" {{ $matakuliah->NIP == $d->NIP ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/matakuliah" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
@endsection