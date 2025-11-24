@extends('layouts.index')

@section('title', 'Data Dosen')
@section('page-title', 'Data Dosen')
@section('create-url', '/input_dsn')

@section('table-headers')
    <th>NIP</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Foto</th>
    <th width="150">Action</th>
@endsection

@section('table-rows')
    @foreach ($dosen as $d)
        <tr>
            <td>{{$d->NIP}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->email}}</td>
            <td>
            @if($d->foto)
                <img src="{{ asset('uploads/' . $d->foto) }}" alt="{{ $d->nama }}" width="80">
                @else
                    <em>Tidak ada Foto</em>
            @endif
            </td>
            <td>
                <a href="/edit_dsn/{{ $d->NIP }}" class="btn btn-warning btn-action">Edit</a>||
                <a href="/hapus_dsn/{{ $d->NIP }}" class="btn btn-danger btn-action" onclick="return confirm('Are you sure?')">Hapus</a>
            </td>
        </tr>
    @endforeach
@endsection