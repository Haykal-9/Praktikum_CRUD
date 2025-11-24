@extends('layouts.app')

@section('title', 'Edit Data Mahasiswa')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Data Mahasiswa</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ url('update_mhs/' . $data_mhs->NIM) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control" value="{{ $data_mhs->NIM }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $data_mhs->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $data_mhs->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select name="prodi" id="prodi" class="form-control" required>
                        <option value="">-- Pilih Prodi --</option>
                        @foreach($data_prodi as $prodi)
                            <option value="{{ $prodi->id_prodi }}" @selected($data_mhs->id_prodi == $prodi->id_prodi)>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto(unggah jika ingin mengganti)</label>
                    <input type="file" name="foto" 
                    @if($data_mhs->foto)
                    <div class="mt-2">
                        <p>Foto saat ini:</p>
                        <img src="{{ asset('uploads/' . $data_mhs->foto) }}" alt="Foto" width="120">
                    </div>
                    @endif
                    
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('/mahasiswa') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
