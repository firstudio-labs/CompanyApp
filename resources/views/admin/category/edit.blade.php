@extends('admin.layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Kategori /</span> Edit Kategori
    </h4>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $category->description) }}</textarea>
                            @error('description') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i> Update Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview Kategori</h5>
                </div>
                <div class="card-body">
                    <span class="badge bg-info fs-5" id="preview-name">{{ old('name', $category->name) ?: 'Nama Kategori' }}</span>
                    <div class="text-muted mt-2" id="preview-description">{{ old('description', $category->description) ?: 'Deskripsi kategori akan tampil di sini...' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    document.getElementById('name').addEventListener('input', function() {
        document.getElementById('preview-name').textContent = this.value || 'Nama Kategori';
    });
    document.getElementById('description').addEventListener('input', function() {
        document.getElementById('preview-description').textContent = this.value || 'Deskripsi kategori akan tampil di sini...';
    });
</script>
@endsection