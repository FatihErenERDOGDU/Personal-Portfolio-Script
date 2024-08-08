@php
use App\Models\Setting;
    $settings = Setting::where('id', '=', 1)->first();
@endphp

@php
use App\Models\Footer;
    $footer =  Footer::where ('id',  '=', 1)->first();
@endphp
@php
    use App\Models\AdminPage;
    $pages = AdminPage::all();
@endphp

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Varsayılan Başlık')</title>
    <!-- CSS ve diğer head içeriği -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    @yield('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        @if(isset($settings->logo_url))
            <img src="/uploads/{{$settings->logo_url }}" height="40" alt="Logo">
        @else
            <object type="image/svg+xml" data="https://nurettin.dev/nurettin.dev.svg" height="40"></object>
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}">About Me</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/skills') }}">Skills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/communication') }}">Contact</a>
            </li>
            @foreach($pages as $page)
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ $page->title }}</a>
                </li>
            @endforeach

        </ul>
    </div>


    <div class="social-icons">
        <ul class="navbar-nav ml-auto d-flex justify-content-start justify-content-lg-end">
            @if(isset($settings->twitter_url))
                <li class="nav-item">
                    <a class="nav-link" href="{{ $settings->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
            @endif
            @if(isset($settings->linkedin_url))
                <li class="nav-item">
                    <a class="nav-link" href="{{ $settings->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </li>
            @endif
            @if(isset($settings->facebook_url))
                <li class="nav-item">
                    <a class="nav-link" href="{{ $settings->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </li>
            @endif
            @if(isset($settings->instagram_url))
                <li class="nav-item">
                    <a class="nav-link" href="{{ $settings->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="footer">
    <section class="bg-light py-4 py-md-5 py-xl-8 border-top border-light">
        <div class="container overflow-hidden">
            <div class="row gy-4 gy-lg-0 justify-content-xl-between">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                    <div class="widget">
                        <a href="#!">
                            @if(isset($footer->logo))
                                <img src="{{ asset('storage/' . $footer->logo) }}" alt="Footer Logo" width="175" height="57">
                            @else
                                <img src="{{ asset('assets/img/nurettin.dev.svg') }}" alt="Footer Logo" width="175" height="57">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                    <div class="widget">
                        <h4 class="widget-title mb-4">Get in Touch</h4>
                        <address class="mb-4">{{ $footer->address ?? 'ADRESS' }}</address>
                        <p class="mb-1">
                            <a class="link-secondary text-decoration-none" href="tel:{{ $footer->phone ?? '+15057922430' }}">{{ $footer->phone ?? '(505) 792-2430' }}</a>
                        </p>
                        <p class="mb-0">
                            <a class="link-secondary text-decoration-none" href="mailto:{{ $footer->email ?? 'demo@yourdomain.com' }}">{{ $footer->email ?? 'erdderen60@gmail.com' }}</a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                    <div class="widget">
                        <h4 class="widget-title mb-4">Learn More</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ url('/about') }}" class="link-secondary text-decoration-none">About</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ url('/communication') }}" class="link-secondary text-decoration-none">Contact</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ url('/index') }}" class="link-secondary text-decoration-none">Home</a>                            </li>
                            <li class="mb-2">
                                <a href="{{ url('/blog') }}" class="link-secondary text-decoration-none">Blog</a>                            </li>
                            <li class="mb-0">
                                <a href="{{ url('/skills') }}" class="link-secondary text-decoration-none">Skills</a>                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-xl-4">
                    <div class="widget">
                        <h4 class="widget-title mb-4">Our Newsletter</h4>
                        <p class="mb-4">Subscribe to our newsletter to get our news & discounts delivered to you.</p>
                        <form action="#!">
                            <div class="row gy-4">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="email-newsletter-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.77V5.383Zm-.034 6.06-4.905-3.43-1.062.636-1.062-.636-4.905 3.43A1 1 0 0 0 2 12h12a1 1 0 0 0 .966-.556ZM1 5.383v6.386l4.708-2.561L1 5.383Z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Email Address" aria-describedby="email-newsletter-addon">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-12 col-xl-6">
                                    <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light py-4 py-md-5 border-top border-light">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">&copy; {{ date('Y') }} <a href="{{ url('/') }}" class="text-decoration-none">{{ config('app.name') }}</a>. All Rights Reserved.</p>
                </div>
                <div class="col-auto">
                    <p class="mb-0">Designed by <a href="https://www.yourwebsite.com" class="text-decoration-none">Your Company</a></p>
                </div>
            </div>
        </div>
    </section>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>
