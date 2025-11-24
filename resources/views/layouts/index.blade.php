@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">@yield('page-title')</h1>
    @hasSection('create-url')
        <a href="@yield('create-url')" class="btn btn-primary btn-sm">+ Tambah Data</a>
    @endif
</div>

<table class="table table-bordered border-primary">
    <thead class="table-dark">
        <tr>
            @yield('table-headers')
        </tr>
    </thead>
    <tbody class="table-primary">
        @yield('table-rows')
    </tbody>
</table>
@endsection