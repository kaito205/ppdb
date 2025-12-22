@extends('layouts.app')

@section('containt')

    @include('main.partials.hero')

    <!-- Quick Info Items -->
    @include('main.partials.fasilitas')
    
    @include('main.partials.prestasi')

    @include('main.partials.ppdb')

    @include('main.partials.alumni')

    @include('main.partials.berita')

@endsection