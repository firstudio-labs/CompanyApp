@extends('admin.layouts.app')

@section('title', 'About Management')

@section('content')
@php use Illuminate\Support\Str; @endphp
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <span><i class="bx bx-info-circle me-2"></i> Manajemen Tentang Kami</span>
        <a href="{{ route('admin.about.edit') }}" class="btn btn-primary shadow-sm">
            <i class="bx bx-edit-alt"></i> {{ isset($about) && $about ? 'Edit' : 'Tambah' }} About
        </a>
    </h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            <i class="bx bx-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible mb-4" role="alert">
            <i class="bx bx-error-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            @if(isset($about) && $about)
                <div class="row justify-content-center align-items-stretch g-4">
                    <!-- Kolom Gambar -->
                    <div class="col-lg-5 mb-4 mb-lg-0 d-flex flex-column gap-4 align-items-center justify-content-center">
                        <div class="position-relative w-100">
                            <img src="{{ !empty($about->image_banner) ? asset($about->image_banner) : asset('assets/img/placeholder-image.png') }}"
                                 alt="Banner Image"
                                 class="img-fluid rounded-4 shadow border border-3 border-primary w-100"
                                 style="max-width: 100%; max-height: 240px; object-fit:cover;">
                            <span class="position-absolute top-50 start-50 translate-middle badge bg-primary fs-6 px-3 py-2 shadow text-break text-center"
                                  style="opacity:0.95; max-width:90%; width:fit-content; white-space:normal; word-break:break-word; line-height:1.8; letter-spacing:0.5px;">
                                {{ $about->text_banner ?? '-' }}
                            </span>
                        </div>
                        <div class="w-100">
                            <img src="{{ !empty($about->image_url) ? asset($about->image_url) : asset('assets/img/placeholder-image.png') }}"
                                 alt="About Image"
                                 class="img-fluid rounded-4 shadow border border-2 border-secondary w-100"
                                 style="max-width: 100%; max-height: 240px; object-fit:cover;">
                            <div class="fw-semibold text-muted small text-center mt-2">Foto</div>
                        </div>
                    </div>
                    <!-- Kolom Teks -->
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="bg-white rounded-4 p-4 shadow-sm w-100 border h-100">
                            <h3 class="fw-bold mb-1 text-primary text-center">{{ $about->title ?? '-' }}</h3>
                            <h5 class="text-secondary mb-3 fst-italic text-center">{{ $about->subtitle ?? '-' }}</h5>
                            <div class="mb-3 text-muted" style="white-space: pre-line; min-height:80px;">
                                {!! isset($about->description) ? Str::limit(strip_tags($about->description), 500, '...') : '-' !!}
                            </div>
                            <div class="row mb-2 g-2">
                                <div class="col-6 mb-1"><i class="bx bx-map-pin me-1 text-primary"></i> <strong>Lokasi:</strong> {{ $about->location ?? '-' }}</div>
                                <div class="col-6 mb-1"><i class="bx bx-phone me-1 text-primary"></i> <strong>Telepon:</strong> {{ $about->phone ?? '-' }}</div>
                                <div class="col-6 mb-1"><i class="bx bx-envelope me-1 text-primary"></i> <strong>Email:</strong> {{ $about->email ?? '-' }}</div>
                                <div class="col-6 mb-1"><i class="bx bx-globe me-1 text-primary"></i> <strong>Website:</strong> {{ $about->website ?? '-' }}</div>
                            </div>
                            <div class="mb-2">
                                <strong><i class="bx bx-bullseye me-1 text-success"></i> Visi:</strong>
                                <span class="text-success">{{ $about->vision ?? '-' }}</span>
                            </div>
                            <div>
                                <strong><i class="bx bx-list-ul me-1 text-info"></i> Misi:</strong>
                                @if(!empty($about->mission))
                                    <ul class="mb-0 ps-3">
                                        @foreach(preg_split('/\r\n|\r|\n/', $about->mission) as $point)
                                            @if(trim($point) !== '')
                                                <li style="word-break:break-word;">{{ $point }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info mb-0 text-center py-5">
                    <i class="bx bx-info-circle bx-lg mb-2"></i>
                    <div class="mb-2">Belum ada data About.</div>
                    <a href="{{ route('admin.about.edit') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Informasi Tentang Kami
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
