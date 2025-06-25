@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-3">Tech Stack List</h1>
    <a href="{{ route('admin.techstack.create') }}" class="btn btn-primary mb-3"><i class="bx bx-plus"></i> Tambah Tech Stack</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Icon</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($techStacks as $techstack)
                    <tr>
                        <td>{{ $techstack->name }}</td>
                        <td>
                            @if($techstack->icon)
                                <img src="{{ asset('storage/'.$techstack->icon) }}" alt="icon" style="max-width:48px;max-height:48px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            {{ $techstack->category ? $techstack->category->name : '-' }}
                        </td>
                        <td>{{ $techstack->description }}</td>
                        <td>
                            <a href="{{ route('admin.techstack.show', $techstack) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('admin.techstack.edit', $techstack) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                            <form action="{{ route('admin.techstack.destroy', $techstack) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($techStacks->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection