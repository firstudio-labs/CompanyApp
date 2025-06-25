@extends('admin.layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Produk /</span> Detail Produk
    </h4>
    <div class="card">
        <div class="card-body">
            @if($product->image_url)
                <img src="{{ asset('images/products/' . $product->image_url) }}" alt="{{ $product->title }}" style="width:200px; height:200px; object-fit:cover;" class="mb-3">
            @endif
            <h5>{{ $product->title }}</h5>
            <p><strong>Service:</strong> {{ $product->service->title ?? '-' }}</p>
            <p><strong>Slug:</strong> {{ $product->slug }}</p>
            <p><strong>Deskripsi:</strong> {!! $product->description !!}</p>
            <p><strong>Link:</strong> {{ $product->link }}</p>
            <p><strong>Dibuat:</strong> {{ $product->created_at->format('d M Y H:i') }}</p>
            <p><strong>Diupdate:</strong> {{ $product->updated_at->format('d M Y H:i') }}</p>
            <p><strong>Tech Stack:</strong>
                @if($product->techStacks->count())
                    @foreach($product->techStacks as $stack)
                        <span class="badge bg-info text-dark" style="margin-right:2px;">
                            @if($stack->icon)
                                <img src="{{ asset('storage/'.$stack->icon) }}" alt="{{ $stack->name }}" style="width:16px;height:16px;object-fit:contain;margin-right:2px;">
                            @endif
                            {{ $stack->name }}
                        </span>
                    @endforeach
                @else
                    <span class="text-muted">-</span>
                @endif
            </p>
            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
