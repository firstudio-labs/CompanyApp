{{-- filepath: resources/views/admin/portfolio/show.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Detail Portfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Portfolio /</span> Detail Portfolio
    </h4>
    <div class="card">
        <div class="card-body">
            @if($portfolio->image_url)
                <img src="{{ asset('images/portfolios/' . $portfolio->image_url) }}" alt="{{ $portfolio->title }}" style="width:200px; height:200px; object-fit:cover;" class="mb-3">
            @endif
            <h5>{{ $portfolio->title }}</h5>
            <p><strong>Service:</strong> {{ $portfolio->service->title ?? '-' }}</p>
            <p><strong>Tech Stack:</strong>
                @if($portfolio->techStacks && $portfolio->techStacks->count())
                    @foreach($portfolio->techStacks as $stack)
                        <span class="badge bg-info text-dark">{{ $stack->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">-</span>
                @endif
            </p>
            <p><strong>Slug:</strong> {{ $portfolio->slug }}</p>
            <p><strong>Deskripsi:</strong> {!! $portfolio->description !!}</p>
            <p><strong>Link:</strong> {{ $portfolio->link }}</p>
            <p><strong>Dibuat:</strong> {{ $portfolio->created_at->format('d M Y H:i') }}</p>
            <p><strong>Diupdate:</strong> {{ $portfolio->updated_at->format('d M Y H:i') }}</p>
            <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
