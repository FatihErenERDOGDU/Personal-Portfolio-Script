@extends('layouts.dashboard')

@section('title', 'Contact Messages')

@section('content')
    <div class="container">
        <h1 class="mb-4">Contact Messages</h1>

        @if($contacts->isEmpty())
            <div class="alert alert-info" role="alert">
                No contact messages found.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Sent At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <form action="{{ route('communication.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $contacts->links() }}
        @endif
    </div>
@endsection
