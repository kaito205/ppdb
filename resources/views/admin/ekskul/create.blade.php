@extends('layouts.admin')

@section('containt')
<h4>Tambah Ekstrakurikuler</h4>

<form action="{{ route('admin.ekskul.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nama Ekstrakurikuler</label>
        <input type="text" class="form-control" name="nama" required>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
