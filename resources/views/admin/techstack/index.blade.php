@extends('admin.layouts.app')

@section('title', 'Kelola Tech Stack')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <span class="text-muted fw-light">Tech Stack /</span> Daftar Tech Stack
        <a href="{{ route('admin.techstack.create') }}" class="btn btn-primary shadow-sm">
            <i class="bx bx-plus"></i> Tambah Tech Stack
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
                            <th>Icon</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($techStacks as $techstack)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($techstack->icon)
                                    <img src="{{ asset('storage/'.$techstack->icon) }}" alt="icon" class="rounded shadow-sm" style="max-width: 40px; max-height: 40px; object-fit: contain;">
                                @else
                                    <span class="text-muted"><i class="bx bx-layer"></i></span>
                                @endif
                            </td>
                            <td><span class="badge bg-info fs-6">{{ $techstack->name }}</span></td>
                            <td>
                                @if($techstack->category && $techstack->category->name)
                                    <span class="badge bg-primary">{{ $techstack->category->name }}</span>
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                            <td>{{ $techstack->description }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.techstack.show', $techstack) }}" class="btn btn-outline-info btn-sm" title="Detail">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('admin.techstack.edit', $techstack) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.techstack.destroy', $techstack) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus tech stack ini?')">
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
                            <td colspan="6" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bx bx-layer bx-lg mb-2"></i>
                                    <div>Belum ada data tech stack.</div>
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