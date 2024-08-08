@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Header Edit</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.header.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="logo_url">Logo</label>
                <input type="file" name="logo_url" id="logo_url" class="form-control">
                @if ($settings->logo_url)
                    <img src="{{ asset('storage/' . $settings->logo_url) }}" alt="Logo" class="mt-2" style="max-width: 200px;">
                @endif
            </div>

            <div class="form-group">
                <label for="twitter_url">Twitter URL</label>
                <input type="url" name="twitter_url" id="twitter_url" class="form-control" value="{{ old('twitter_url', $settings->twitter_url) }}">
            </div>

            <div class="form-group">
                <label for="linkedin_url">LinkedIn URL</label>
                <input type="url" name="linkedin_url" id="linkedin_url" class="form-control" value="{{ old('linkedin_url', $settings->linkedin_url) }}">
            </div>

            <div class="form-group">
                <label for="facebook_url">Facebook URL</label>
                <input type="url" name="facebook_url" id="facebook_url" class="form-control" value="{{ old('facebook_url', $settings->facebook_url) }}">
            </div>

            <div class="form-group">
                <label for="instagram_url">Instagram URL</label>
                <input type="url" name="instagram_url" id="instagram_url" class="form-control" value="{{ old('instagram_url', $settings->instagram_url) }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
