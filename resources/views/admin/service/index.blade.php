@extends('admin.layouts.app')

@section('title', 'Kelola Layanan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <span class="text-muted fw-light">Layanan /</span> Daftar Layanan
        <a href="{{ route('admin.service.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Layanan
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
                            <th>#</th>
                            <th>Banner</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                        <tr>
                            <td>{{ ($services->currentPage() - 1) * $services->perPage() + $loop->iteration }}</td>
                            <td>
                                @if($service->image_banner)
                                    <img src="{{ asset($service->image_banner) }}" alt="Banner" style="max-width: 80px; max-height: 80px;">
                                @else
                                    <img src="{{ asset('assets/img/placeholder-image.png') }}" alt="Banner" style="max-width: 80px; max-height: 80px;">
                                @endif
                            </td>
                            <td>
                                @if($service->image_url)
                                    <img src="{{ asset($service->image_url) }}" alt="Gambar" style="max-width: 80px; max-height: 80px;">
                                @else
                                    <img src="{{ asset('assets/img/placeholder-image.png') }}" alt="Gambar" style="max-width: 80px; max-height: 80px;">
                                @endif
                            </td>
                            <td>{{ $service->title }}</td>
                            <td>{{ Str::limit(strip_tags($service->description), 50) }}</td>
                            <td>
                                <a href="{{ route('admin.service.show', $service->id) }}" class="btn btn-info btn-sm mb-1">Detail</a>
                                <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-primary btn-sm mb-1"><i class="bx bx-edit-alt"></i></a>
                                <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin hapus data?')"><i class="bx bx-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada layanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
