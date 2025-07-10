@extends('admin.layouts.app')

@section('title', 'Detail Artikel')

@section('styles')
<style>
    .blog-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
    }
    
    .blog-image {
        width: 100%;
        height: auto;
        transition: all 0.5s;
    }
    
    .blog-image:hover {
        transform: scale(1.03);
    }
    
    .blog-content {
        padding: 1.5rem;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }
    
    .blog-content img {
        max-width: 100%;
        height: auto;
    }
    
    .tag-badge {
        font-size: 0.8rem;
        padding: 0.25rem 0.5rem;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        border-radius: 50rem;
        display: inline-block;
        background-color: #e9ecef;
        color: #566a7f;
        transition: all 0.2s;
    }
    
    .tag-badge:hover {
        background-color: #696cff;
        color: #fff;
        transform: translateY(-2px);
    }
    
    .stats-card {
        transition: all 0.3s;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
    }
    
    .meta-item i {
        margin-right: 0.5rem;
        color: #696cff;
    }
    
    .action-buttons .btn {
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        transition: all 0.2s;
    }
    
    .action-buttons .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Artikel /</span> Detail Artikel
    </h4>
    <div class="card">
        <div class="card-body">
            @if($article->image_url)
                <img src="{{ asset($article->image_url) }}" alt="Gambar Artikel" class="mb-3" style="max-width:300px;">
            @endif
            <h4>{{ $article->title }}</h4>
            <h6 class="text-muted">{{ $article->subtitle }}</h6>
            <div class="mb-2">
                <strong>Penulis:</strong> {{ $article->author ?? '-' }}<br>
                <strong>Layanan:</strong> 
                @if($article->service && $article->service->name)
                    <span class="badge bg-info">{{ $article->service->name }}</span>
                @else
                    <span class="badge bg-secondary">-</span>
                @endif<br>
                <strong>Tanggal Publikasi:</strong> {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : '-' }}<br>
                <strong>Slug:</strong> {{ $article->slug }}
            </div>
            <div class="mb-3" style="text-align: justify;">
                {!! $article->content !!}
            </div>
            <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-primary me-2">
                <i class="bx bx-edit-alt me-1"></i> Edit
            </a>
            <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Auto close alert after a few seconds
        setTimeout(function() {
            const alertElements = document.querySelectorAll('.alert');
            alertElements.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    });
</script>
@endsection
