@extends('admin.layouts.app')

@section('title', 'Kelola Portfolio')

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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                    <tr>
                        <td>{{ ($portfolios->currentPage() - 1) * $portfolios->perPage() + $loop->iteration }}</td>
                        <td>
                            @if($portfolio->image_url)
                                <img src="{{ asset('images/portfolios/' . $portfolio->image_url) }}" alt="{{ $portfolio->title }}" style="width:60px; height:60px; object-fit:cover;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->service->title ?? '-' }}</td>
                        <td>
                            @if($portfolio->techStacks && $portfolio->techStacks->count())
                                @foreach($portfolio->techStacks as $stack)
                                    <span class="badge bg-info text-dark">{{ $stack->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.portfolio.show', $portfolio->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus portfolio?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada portfolio.</td>
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
