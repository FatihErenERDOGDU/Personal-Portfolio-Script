@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Footer Edit</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.footer.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $footer->address ?? '') }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $footer->phone ?? '') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $footer->email ?? '') }}">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                @if(isset($footer->logo))
                    <div>
                        <img src="{{ asset('storage/' . $footer->logo) }}" alt="Logo" width="100">
                    </div>
                @endif
                <input type="file" name="logo" id="logo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update Footer</button>
        </form>
    </div>
@endsection
