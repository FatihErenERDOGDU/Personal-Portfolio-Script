@extends('layouts.template')

@section('title', 'Blog')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Latest Blog Posts</h2>
                @foreach($posts as $post)
                    <div class="card mb-4">
                        @if($post->image)
                            <img src="{{ $post->image }}" class="card-img-top img-fluid" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 120) }}</p>
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection
