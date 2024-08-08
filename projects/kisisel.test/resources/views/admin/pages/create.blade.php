@extends('admin.dashboard')

@section('title', 'Create Page')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Create New Page</h1>
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
