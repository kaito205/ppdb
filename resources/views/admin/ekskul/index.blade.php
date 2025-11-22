@extends('layouts.admin')

@section('containt')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="d-flex justify-content-between mb-3">
    <h4>Data Ekstrakurikuler</h4>
    <a href="{{ route('admin.ekskul.tambah') }}" class="btn btn-success">+ Tambah Ekstrakurikuler</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td><img src="/uploads/ekskul/{{ $item->foto }}" width="80"></td>
            <td>
                <a href="{{ route('admin.ekskul.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('admin.ekskul.hapus', $item->id) }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
