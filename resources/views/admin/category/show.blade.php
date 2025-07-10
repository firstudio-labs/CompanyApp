@extends('admin.layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Kategori /</span> Detail Kategori
    </h4>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-category text-primary me-2"></i> Informasi Kategori</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <span class="badge bg-info fs-5">{{ $category->name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Slug:</strong> <span class="text-muted">{{ $category->slug }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Deskripsi:</strong> <span class="text-muted">{{ $category->description }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-cog text-primary me-2"></i> Aksi</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-warning">
                            <i class="bx bx-edit-alt me-1"></i> Edit Kategori
                        </a>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection