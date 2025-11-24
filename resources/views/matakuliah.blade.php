@extends('layouts.index')

@section('title', 'Data Mata Kuliah')
@section('page-title', 'Data Mata Kuliah')
@section('create-url', '/input_matakuliah')

@section('table-headers')
    <th>Kode MK</th>
    <th>Nama MK</th>
    <th>SKS</th>
    <th>Dosen</th>
    <th width="150">Action</th>
@endsection

@section('table-rows')
    @foreach ($matakuliah as $mk)
        <tr>
            <td>{{$mk->id_mk}}</td>
            <td>{{$mk->nama_mk}}</td>
            <td>{{$mk->sks}}</td>
            <td>{{$mk->dosen->nama}}</td>
            <td>
                <a href="/edit_matakuliah/{{ $mk->id_mk }}" class="btn btn-warning btn-action">Edit</a>||
                <a href="/hapus_matakuliah/{{ $mk->id_mk }}" class="btn btn-danger btn-action" onclick="return confirm('Are you sure?')">Hapus</a>
            </td>
        </tr>
    @endforeach
@endsection