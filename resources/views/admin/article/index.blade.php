@extends('admin.layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <span class="text-muted fw-light">Artikel /</span> Daftar Artikel
        <a href="{{ route('admin.article.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Artikel
        </a>
    </h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Subjudul</th>
                            <th>Penulis</th>
                            <th>Layanan</th>
                            <th>Dipublikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        <tr>
                            <td>{{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}</td>
                            <td>
                                @if($article->image_url)
                                    <img src="{{ asset($article->image_url) }}" alt="Gambar" style="max-width: 80px; max-height: 80px;">
                                @endif
                            </td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->subtitle }}</td>
                            <td>{{ $article->author }}</td>
                            <td>{{ $article->service ? $article->service->name : '-' }}</td>
                            <td>{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('admin.article.show', $article->id) }}" class="btn btn-info btn-sm mb-1"><i class="bx bx-show"></i></a>
                                <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-primary btn-sm mb-1"><i class="bx bx-edit-alt"></i></a>
                                <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin hapus data?')"><i class="bx bx-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada artikel.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
