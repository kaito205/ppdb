@extends('layouts.admin')

@section('title', 'Halaman Tidak Ditemukan')

@section('containt')
<div class="container-fluid text-center mt-5">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">Halaman Tidak Ditemukan</p>
    <p class="text-gray-500 mb-0">Sepertinya Anda tersesat di sistem admin...</p>
    <a href="{{ route('dashboard.admin') }}" class="btn btn-primary mt-4">&larr; Kembali ke Dashboard</a>
</div>
@endsection
