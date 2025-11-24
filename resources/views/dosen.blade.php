@extends('layouts.index')

@section('title', 'Data Dosen')
@section('page-title', 'Data Dosen')

@if(Auth::user()->role === 'admin')
@section('create-url', '/input_dsn')
@endif

@section('table-headers')
    <th>NIP</th>
    <th>Nama</th>
    <th>Email</th>
    @if(Auth::user()->role === 'admin')
        <th>Foto</th>
        <th width="150">Action</th>
    @endif
@endsection

@section('table-rows')
    @foreach ($dosen as $d)
        <tr>
            <td>{{$d->NIP}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->email}}</td>
            @if(Auth::user()->role === 'admin')
                <td>
                    @if($d->foto)
                        <img src="{{ asset('uploads/' . $d->foto) }}" alt="{{ $d->nama }}" width="80">
                    @else
                        <em>Tidak ada Foto</em>
                    @endif
                </td>
                <td>
                    <a href="/edit_dsn/{{ $d->NIP }}" class="btn btn-warning btn-action">Edit</a>||
                    <a href="/hapus_dsn/{{ $d->NIP }}" class="btn btn-danger btn-action"
                        onclick="return confirm('Are you sure?')">Hapus</a>
                </td>
            @endif
        </tr>
    @endforeach
@endsection