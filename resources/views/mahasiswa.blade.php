@extends('layouts.index')
@section('title', 'Data Mahasiswa')
@section('page-title', 'Data Mahasiswa')

@if(Auth::user()->role === 'admin')
@section('create-url', '/input_mhs')
@endif

@section('table-headers')
    <th>NIM</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Prodi</th>
    @if(Auth::user()->role === 'admin')
        <th>Foto</th>
        <th width="150">Action</th>
    @endif
@endsection

@section('table-rows')
    @foreach ($mhs as $x)
        <tr>
            <td>{{$x->NIM}}</td>
            <td>{{$x->nama}}</td>
            <td>{{$x->email}}</td>
            <td>{{$x->prodi->nama_prodi}}</td>
            @if(Auth::user()->role === 'admin')
                <td>
                    @if($x->foto)
                        <img src="{{ asset('uploads/' . $x->foto) }}" alt="{{ $x->nama }}" width="80">
                    @else
                        <em>Tidak ada Foto</em>
                    @endif
                </td>
                <td>
                    <a href="/edit_mhs/{{ $x->NIM }}" class="btn btn-warning btn-action">Edit</a>||
                    <a href="/hapus_mhs/{{ $x->NIM }}" class="btn btn-danger btn-action"
                        onclick="return confirm('Are you sure?')">Hapus</a>
                </td>
            @endif
        </tr>
    @endforeach
@endsection