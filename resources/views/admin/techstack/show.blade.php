@extends('admin.layouts.app')

@section('title', 'Detail Tech Stack')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tech Stack /</span> Detail Tech Stack
    </h4>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="bx bx-info-circle me-2"></i> Informasi Tech Stack</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        @if($techstack->icon)
                            <img src="{{ asset('storage/'.$techstack->icon) }}" alt="icon" class="img-thumbnail mb-2" style="max-height:100px;">
                        @else
                            <img src="{{ asset('assets/img/placeholder-image.png') }}" alt="icon" class="img-thumbnail mb-2" style="max-height:100px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <span class="badge bg-info fs-5">{{ $techstack->name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Kategori:</strong> 
                        @if($techstack->category && $techstack->category->name)
                            <span class="badge bg-primary">{{ $techstack->category->name }}</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Deskripsi:</strong> <span class="text-muted">{{ $techstack->description }}</span>
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.techstack.edit', $techstack) }}" class="btn btn-warning"><i class="bx bx-edit"></i> Edit</a>
                        <a href="{{ route('admin.techstack.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection