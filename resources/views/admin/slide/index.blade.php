@extends('admin.layouts.app')

@section('title', 'Kelola Slide')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <span class="text-muted fw-light">Slide /</span> Daftar Slide
        <a href="{{ route('admin.slide.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Slide
        </a>
    </h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Subjudul</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slides as $slide)
                        <tr>
                            <td>
                                <img src="{{ $slide->image_url }}" alt="Gambar" style="max-width: 80px; max-height: 80px;">
                            </td>
                            <td>{{ $slide->title }}</td>
                            <td>{{ $slide->subtitle }}</td>
                            <td>{{ $slide->order }}</td>
                            <td>{!! $slide->is_active ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Nonaktif</span>' !!}</td>
                            <td>
                                <a href="{{ route('admin.slide.edit', $slide) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                <a href="{{ route('admin.slide.show', $slide) }}" class="btn btn-info btn-sm mb-1">Detail</a>
                                <form action="{{ route('admin.slide.destroy', $slide) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus slide?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm mb-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
