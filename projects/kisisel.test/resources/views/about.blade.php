@extends('layouts.template')

@section('title', 'About')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('storage/uploads/' . $about->image) }}" alt="About Image" style="width: 100%; height: auto; max-width: 800px;" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <p>{{ $about->text }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
