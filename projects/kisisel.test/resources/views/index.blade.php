@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <section class="section home-5-bg" id="home">
        <div id="particles-js"></div>
        <div class="bg-overlay"></div>
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="justify-content-center row">
                        <div class="col-lg-7">
                            <div class="mt-40 text-center home-5-content">
                                <div class="home-icon mb-4"><i class="mdi mdi-pinwheel mdi-spin text-white h1"></i></div>
                                <h1 class="text-white font-weight-normal home-5-title mb-0">FATİH EREN ERDOĞDU</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="main-timeline">
            @foreach ($experiences as $experience)
                <div class="timeline">
                    <div class="icon"></div>
                    <div class="date-content">
                        <div class="date-outer">
                            <span class="date">
                                <span class="month">{{ $experience->duration }}</span>
                                <span class="year">{{ $experience->year }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="timeline-content">
                        <h5 class="title">{{ $experience->title }}</h5>
                        <p class="description">
                            {{ $experience->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script src="{{ asset('assets/js/particles-config.js') }}"></script>
@endsection
