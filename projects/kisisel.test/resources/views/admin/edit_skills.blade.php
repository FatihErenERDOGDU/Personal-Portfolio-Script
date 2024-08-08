@extends('layouts.dashboard')

@section('content')
    <h1>Edit Skill</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $skill->name) }}">
        </div>
        <div>
            <label for="progress">Progress:</label>
            <input type="number" id="progress" name="progress" value="{{ old('progress', $skill->progress) }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $skill->description) }}</textarea>
        </div>
        <button type="submit">Update Skill</button>
    </form>
@endsection
