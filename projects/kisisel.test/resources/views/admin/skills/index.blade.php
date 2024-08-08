@extends('layouts.dashboard')

@section('title', 'Skills')

@section('content')
    <div class="container">
        <h1>Skills</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.skills.create') }}" class="btn btn-primary mb-3">Add New Skill</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Progress</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->progress }}%</td>
                    <td>{{ $skill->description }}</td>
                    <td>
                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this skill?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No skills found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
