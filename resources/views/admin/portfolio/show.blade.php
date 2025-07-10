{{-- filepath: resources/views/admin/portfolio/show.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Detail Portfolio')

@section('styles')
<style>
    .badge {
        font-size: 0.75rem;
    }
    
    .badge img {
        vertical-align: middle;
    }
    
    .portfolio-image {
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .portfolio-image:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    
    .info-card {
        border: 1px solid #e9ecef;
        border-radius: 0.5rem;
    }
    
    .description-box {
        background-color: #f8f9fa;
        border-radius: 0.5rem;
        padding: 1rem;
        border-left: 4px solid #007bff;
    }
</style>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Portfolio /</span> Detail Portfolio
    </h4>
    <div class="card">
        <div class="card-body">
            @if($portfolio->image_url)
                <div class="text-center mb-4">
                    <img src="{{ asset('images/portfolios/' . $portfolio->image_url) }}" alt="{{ $portfolio->title }}" class="portfolio-image" style="width:300px; height:300px; object-fit:cover; border-radius:8px;">
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-3">{{ $portfolio->title }}</h4>
                    <div class="mb-3">
                        <strong>Service:</strong> 
                        @if($portfolio->service)
                            <span class="badge bg-primary">{{ $portfolio->service->title }}</span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Tech Stack:</strong>
                        @if($portfolio->techStacks && $portfolio->techStacks->count())
                            <div class="mt-2">
                                @foreach($portfolio->techStacks as $stack)
                                    <span class="badge bg-info text-dark me-2 mb-2">
                                        @if($stack->icon)
                                            <img src="{{ asset('storage/'.$stack->icon) }}" alt="{{ $stack->name }}" style="width:16px;height:16px;object-fit:contain;margin-right:4px;">
                                        @endif
                                        {{ $stack->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Slug:</strong> 
                        <code>{{ $portfolio->slug }}</code>
                    </div>
                    <div class="mb-3">
                        <strong>Link:</strong> 
                        @if($portfolio->link)
                            <a href="{{ $portfolio->link }}" target="_blank" class="text-primary">{{ $portfolio->link }}</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Deskripsi:</strong>
                        <div class="mt-2 description-box">
                            {!! $portfolio->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card">
                        <div class="card-header">
                            <h6 class="mb-0">Informasi Portfolio</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <small class="text-muted">Dibuat:</small><br>
                                <strong>{{ $portfolio->created_at->format('d M Y H:i') }}</strong>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted">Diupdate:</small><br>
                                <strong>{{ $portfolio->updated_at->format('d M Y H:i') }}</strong>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm w-100 mb-2">
                                    <i class="bx bx-edit me-1"></i> Edit Portfolio
                                </a>
                                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary btn-sm w-100">
                                    <i class="bx bx-arrow-back me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
