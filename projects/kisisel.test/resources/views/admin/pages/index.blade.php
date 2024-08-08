@extends('layouts.dashboard')

@section('content')
    <h1>Sayfa Yönetimi</h1>

    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Yeni Sayfa Ekle</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Başlık</th>
            <th>İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning">Düzenle</a>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
