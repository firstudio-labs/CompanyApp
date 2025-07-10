@extends('admin.layouts.app')

@section('title', 'Detail Client')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Client /</span> Detail Client
    </h4>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-building text-primary me-2"></i> Informasi Client</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Nama Perusahaan</label>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $client->company_name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Logo Perusahaan</label>
                        </div>
                        <div class="col-sm-9">
                            @if($client->company_logo)
                                <img src="{{ asset('images/clients/' . $client->company_logo) }}" alt="Logo {{ $client->company_name }}" 
                                     class="rounded shadow-sm" style="max-width: 150px; max-height: 150px; object-fit: contain;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                     style="width: 150px; height: 150px;">
                                    <i class="bx bx-building text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Layanan</label>
                        </div>
                        <div class="col-sm-9">
                            @if($client->service && $client->service->title)
                                <span class="badge bg-info fs-6">{{ $client->service->title }}</span>
                            @else
                                <span class="badge bg-secondary">Tidak ada layanan</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Tanggal Dibuat</label>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $client->created_at ? \Carbon\Carbon::parse($client->created_at)->format('d M Y H:i') : '-' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Terakhir Diupdate</label>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $client->updated_at ? \Carbon\Carbon::parse($client->updated_at)->format('d M Y H:i') : '-' }}</p>
                        </div>
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
                        <a href="{{ route('admin.client.edit', $client) }}" class="btn btn-warning">
                            <i class="bx bx-edit-alt me-1"></i> Edit Client
                        </a>
                        <a href="{{ route('admin.client.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection