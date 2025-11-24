@extends('layouts.index')

@section('title', 'Data Mata Kuliah')
@section('page-title', 'Data Mata Kuliah')

@if(Auth::user()->role === 'admin')
@section('create-url', '/input_matakuliah')
@endif

@section('table-headers')
    <th>Kode MK</th>
    <th>Nama MK</th>
    <th>SKS</th>
    <th>Dosen</th>
    @if(Auth::user()->role === 'admin')
        <th width="150">Action</th>
    @endif
@endsection

@section('table-rows')
    @foreach ($matakuliah as $mk)
        <tr>
            <td>{{$mk->id_mk}}</td>
            <td>{{$mk->nama_mk}}</td>
            <td>{{$mk->sks}}</td>
            <td>{{$mk->dosen->nama}}</td>
            @if(Auth::user()->role === 'admin')
                <td>
                    <a href="/edit_matakuliah/{{ $mk->id_mk }}" class="btn btn-warning btn-action">Edit</a>||
                    <a href="/hapus_matakuliah/{{ $mk->id_mk }}" class="btn btn-danger btn-action"
                        onclick="return confirm('Are you sure?')">Hapus</a>
                </td>
            @endif
        </tr>
    @endforeach
@endsection