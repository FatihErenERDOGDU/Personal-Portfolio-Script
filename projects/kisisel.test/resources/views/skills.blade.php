@extends('layouts.template')

@section('title', 'Skills')

@section('content')
    <div class="header-image">
        <img src="https://www.augsburg.edu/strommen/wp-content/uploads/sites/99/2020/06/Header-1-1024x320.png" alt="Header Image" class="img-fluid">
    </div>

    <section class="bg-light py-5 py-xl-6">
        <div class="container mb-5 mb-md-6">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                    <h2 class="mb-4 display-5">Skills</h2>
                    <hr class="w-50 mx-auto mb-0 text-secondary">
                </div>
            </div>
        </div>
        <div class="container overflow-hidden">
            <div class="row justify-content-xl-center gy-3 gy-sm-4">
                @foreach ($skills as $skill)
                    <div class="col-12 col-sm-6 col-xl-5">
                        <div class="bg-white rounded shadow-sm p-3 p-md-4 p-xxl-5">
                            <h3 class="fw-bold mb-2"><i class="fab fa-{{ strtolower($skill->name) }}"></i> {{ $skill->name }}</h3>
                            <p class="text-secondary fst-italic mb-4">{{ $skill->description }}</p>
                            <div class="progress">
                                <div class="progress-bar w-{{ $skill->progress }} progress-bar-striped progress-bar-animated" role="progressbar" aria-label="{{ $skill->name }}" aria-valuenow="{{ $skill->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->progress }}%</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection

