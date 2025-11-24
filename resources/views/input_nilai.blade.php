@extends('layouts.app')

@section('title', 'Input Nilai')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Input Data Nilai</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="/simpan_nilai" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="NIM" class="form-label">Mahasiswa</label>
                                <select name="NIM" id="NIM" class="form-select" required>
                                    <option value="">Pilih Mahasiswa</option>
                                    @foreach ($mahasiswa as $m)
                                        <option value="{{ $m->NIM }}">{{ $m->NIM }} - {{ $m->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_mk" class="form-label">Mata Kuliah</label>
                                <select name="id_mk" id="id_mk" class="form-select" required>
                                    <option value="">Pilih Mata Kuliah</option>
                                    @foreach ($matakuliah as $mk)
                                        <option value="{{ $mk->id_mk }}">{{ $mk->nama_mk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nilai" class="form-label">Nilai</label>
                                <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="berkas" class="form-label">pdf</label>
                                <input type="file" name="berkas" id="berkas" class="form-control" accept="application/pdf">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/nilai" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection