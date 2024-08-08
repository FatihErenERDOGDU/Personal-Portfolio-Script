@extends('admin.dashboard')

@section('title', 'Edit Page')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Page</h1>
        <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $page->title) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
