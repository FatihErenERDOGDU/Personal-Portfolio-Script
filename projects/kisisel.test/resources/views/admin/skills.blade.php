@extends('layouts.dashboard')

@section('content')
    <h1>Skills</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.skills.create') }}">Add New Skill</a>

    @if ($skills->isEmpty())
        <p>No skills found.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Progress</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->progress }}</td>
                    <td>{{ $skill->description }}</td>
                    <td>
                        <a href="{{ route('admin.skills.edit', $skill->id) }}">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
