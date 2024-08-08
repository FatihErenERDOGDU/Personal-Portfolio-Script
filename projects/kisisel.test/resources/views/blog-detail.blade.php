@extends('layouts.template')

@section('title', $post->title)

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">{{ $post->title }}</h2>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-4" alt="{{ $post->title }}">
                @endif
                <p>{{ $post->content }}</p>
                <a href="{{ url('/blog') }}" class="btn btn-secondary">Back to Blog</a>
            </div>

            <div class="col-md-4">
                <!-- Optional: Sidebar content like categories or recent posts -->
            </div>
        </div>
    </div>
@endsection
