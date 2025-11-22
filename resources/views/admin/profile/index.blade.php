@extends('layouts.admin')

@section('title', 'Kelola Profil Sekolah')

@section('containt')
<div class="container">
    <h3 class="mb-4">Kelola Profil Sekolah</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" value="{{ $profil->nama_sekolah ?? '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="form-control">{{ $profil->deskripsi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Sekolah</label>
            <input type="file" name="foto" class="form-control">

            @if (!empty($profil->foto))
                <img src="{{ asset('uploads/profil/'.$profil->foto) }}" class="img-thumbnail mt-3" width="300">
            @endif
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
