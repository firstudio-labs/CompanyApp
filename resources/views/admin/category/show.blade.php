@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kategori</h1>
    <div class="mb-3">
        <strong>Nama:</strong> {{ $category->name }}
    </div>
    <div class="mb-3">
        <strong>Slug:</strong> {{ $category->slug }}
    </div>
    <div class="mb-3">
        <strong>Deskripsi:</strong> {{ $category->description }}
    </div>
    <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection