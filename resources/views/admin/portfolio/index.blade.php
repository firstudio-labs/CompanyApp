@extends('admin.layouts.app')

@section('title', 'Kelola Portfolio')

@section('styles')
<style>
    .badge {
        font-size: 0.75rem;
    }
    
    .badge img {
        vertical-align: middle;
    }
    
    .portfolio-thumbnail {
        transition: all 0.3s ease;
        border-radius: 4px;
    }
    
    .portfolio-thumbnail:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .empty-state {
        color: #6c757d;
    }
    
    .empty-state i {
        opacity: 0.5;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.25rem;
    }
    
    .action-buttons .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0,123,255,0.05);
    }
</style>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Portfolio /</span> Kelola Portfolio
    </h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Portfolio</h5>
            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Tambah Portfolio
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
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                    <tr>
                        <td>{{ ($portfolios->currentPage() - 1) * $portfolios->perPage() + $loop->iteration }}</td>
                        <td>
                            @if($portfolio->image_url)
                                <img src="{{ asset('images/portfolios/' . $portfolio->image_url) }}" alt="{{ $portfolio->title }}" class="portfolio-thumbnail" style="width:60px; height:60px; object-fit:cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center portfolio-thumbnail" style="width:60px; height:60px;">
                                    <i class="bx bx-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div>
                                <strong>{{ $portfolio->title }}</strong>
                                <br>
                                <small class="text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($portfolio->description), 50) }}</small>
                            </div>
                        </td>
                        <td>
                            @if($portfolio->service)
                                <span class="badge bg-primary">{{ $portfolio->service->title }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($portfolio->techStacks && $portfolio->techStacks->count())
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($portfolio->techStacks as $stack)
                                        <span class="badge bg-info text-dark" style="font-size: 0.75rem;">
                                            @if($stack->icon)
                                                <img src="{{ asset('storage/'.$stack->icon) }}" alt="{{ $stack->name }}" style="width:12px;height:12px;object-fit:contain;margin-right:2px;">
                                            @endif
                                            {{ $stack->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($portfolio->link)
                                <a href="{{ $portfolio->link }}" target="_blank" class="text-primary">
                                    <i class="bx bx-link-external"></i>
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.portfolio.show', $portfolio->id) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus portfolio ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="empty-state">
                                <i class="bx bx-folder-open" style="font-size: 3rem;"></i>
                                <p class="mt-2 mb-0">Belum ada portfolio.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $portfolios->links() }}
    </div>
</div>
@endsection
