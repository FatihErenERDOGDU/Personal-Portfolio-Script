@extends('layouts.dashboard')

@section('title', 'About')

@section('content')
    <div class="container mt-5">
        <h1>About Information</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" id="image" name="image" class="form-control">
                @if(isset($about) && $about->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/uploads' . $about->image) }}" alt="Current Image" class="img-fluid" style="max-width: 200px;">
                        <p class="mt-2">Current Image</p>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text:</label>
                <textarea id="text" name="text" class="form-control" rows="4" required>{{ $about->text ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
