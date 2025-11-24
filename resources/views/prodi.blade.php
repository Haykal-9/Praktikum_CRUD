@extends('layouts.index')

@section('title', 'Data Program Studi')
@section('page-title', 'Data Program Studi')

@if(Auth::user()->role === 'admin')
@section('create-url', '/input_prodi')
@endif

@section('table-headers')
    <th>Kode Prodi</th>
    <th>Nama Prodi</th>
    @if(Auth::user()->role === 'admin')
        <th width="150">Action</th>
    @endif
@endsection

@section('table-rows')
    @foreach ($prodi as $p)
        <tr>
            <td>{{$p->id_prodi}}</td>
            <td>{{$p->nama_prodi}}</td>
            @if(Auth::user()->role === 'admin')
                <td>
                    <a href="/edit_prodi/{{ $p->id_prodi }}" class="btn btn-warning btn-action">Edit</a>||
                    <a href="/hapus_prodi/{{ $p->id_prodi }}" class="btn btn-danger btn-action"
                        onclick="return confirm('Are you sure?')">Hapus</a>
                </td>
            @endif
        </tr>
    @endforeach
@endsection