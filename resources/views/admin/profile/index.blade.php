@extends('layouts.admin')

@section('containt')
<div class="container mt-4">

    <h3>Pengaturan Profil Sekolah</h3>

    {{-- PESAN SUKSES --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control"
                value="{{ $profil->nama_sekolah ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5">{{ $profil->deskripsi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Visi</label>
            <textarea name="visi" class="form-control" rows="4">{{ $profil->visi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Misi</label>
            <textarea name="misi" class="form-control" rows="5">{{ $profil->misi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Foto Profil</label><br>
            @if (!empty($profil->foto))
                <img src="{{ asset('uploads/profil/' . $profil->foto) }}" width="200" class="mb-3 rounded">
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>

    </form>

</div>
@endsection
