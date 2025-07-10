@extends('admin.layouts.app')

@section('title', 'Kelola Client')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <span class="text-muted fw-light">Client /</span> Daftar Client
        <a href="{{ route('admin.client.create') }}" class="btn btn-primary shadow-sm">
            <i class="bx bx-plus"></i> Tambah Client
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
                            <th style="width: 50px;">#</th>
                            <th style="width: 100px;">Logo</th>
                            <th>Nama Perusahaan</th>
                            <th>Layanan</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $client)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($client->company_logo)
                                    <img src="{{ asset('images/clients/' . $client->company_logo) }}" alt="Logo {{ $client->company_name }}" 
                                         class="rounded shadow-sm" style="max-width: 60px; max-height: 60px; object-fit: contain;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="width: 60px; height: 60px;">
                                        <i class="bx bx-building text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $client->company_name }}</div>
                            </td>
                            <td>
                                @if($client->service && $client->service->title)
                                    <span class="badge bg-info">{{ $client->service->title }}</span>
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.client.show', $client) }}" class="btn btn-outline-info btn-sm" title="Detail">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('admin.client.edit', $client) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.client.destroy', $client) }}" method="POST" class="d-inline" 
                                          onsubmit="return confirm('Yakin ingin menghapus client ini?')">
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
                            <td colspan="5" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bx bx-building bx-lg mb-2"></i>
                                    <div>Belum ada data client.</div>
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