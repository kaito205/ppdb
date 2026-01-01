@extends('layouts.app')

@section('containt')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    @include('main.partials.hero')

    @include('main.partials.profil')

    @include('main.partials.fasilitas')
    
    @include('main.partials.prestasi')

    @include('main.partials.alumni')

    @include('main.partials.berita')

@endsection