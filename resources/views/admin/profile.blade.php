@extends('layouts.admin')

@section('title', 'Propile')

@section('containt')
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('img/pp.jpg') }}" class="rounded-circle mb-3" alt="Profile Picture" width="200px">
                    <h4></h4>

                    <button class="btn text-white">Upload New</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="">Profile</a>
                        </li>
                    </ul>
                    <div class="mt-3">
                        <h5>Profile Information</h5>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Nama :</strong></div>
                            <div class="col-sm-8">kaito</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Email:</strong></div>
                            <div class="col-sm-8">
                                kaito@gmail.com

                                <a href="" class="text-primary ml-2"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
