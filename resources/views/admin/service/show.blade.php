@extends('admin.layouts.app')

@section('title', 'Detail Layanan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Layanan /</span> Detail Layanan
    </h4>
    <div class="card">
        <div class="card-body">
            @if($service->image_banner)
                <img src="{{ asset($service->image_banner) }}" alt="Banner" class="mb-3" style="max-width:300px;">
            @endif
            @if($service->image_url)
                <img src="{{ asset($service->image_url) }}" alt="Gambar" class="mb-3" style="max-width:300px;">
            @endif
            <h4>{{ $service->title }}</h4>
            <div class="mb-2">
                <strong>Slug:</strong> {{ $service->slug }}
            </div>
            <div class="mb-3" style="text-align: justify;">
                {!! $service->description !!}
            </div>
            <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-primary me-2">
                <i class="bx bx-edit-alt me-1"></i> Edit
            </a>
            <a href="{{ route('admin.service.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
