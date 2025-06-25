@extends('admin.layouts.app')

@section('title', 'Kelola Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Produk /</span> Kelola Produk
    </h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Produk</h5>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Tambah Produk
            </a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Service</th>
                        <th>Tech Stack</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                        <td>
                            @if($product->image_url)
                                <img src="{{ asset('images/products/' . $product->image_url) }}" alt="{{ $product->title }}" style="width:60px; height:60px; object-fit:cover;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->service->title ?? '-' }}</td>
                        <td>
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
                        </td>
                        <td>
                            <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus produk?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
