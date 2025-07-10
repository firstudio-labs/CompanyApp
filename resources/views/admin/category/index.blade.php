@extends('admin.layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <span class="text-muted fw-light">Kategori /</span> Daftar Kategori
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary shadow-sm">
            <i class="bx bx-plus"></i> Tambah Kategori
        </a>
    </h4>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <i class="bx bx-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-info fs-6">{{ $category->name }}</span></td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.category.show', $category) }}" class="btn btn-outline-info btn-sm" title="Detail">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.category.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bx bx-category bx-lg mb-2"></i>
                                    <div>Belum ada data kategori.</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection