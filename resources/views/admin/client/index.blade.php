@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Client</h1>
    <a href="{{ route('admin.client.create') }}" class="btn btn-primary mb-3">Tambah Client</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Logo</th>
                <th>Layanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td>{{ $client->company_name }}</td>
                <td>
                    @if($client->company_logo)
                        <img src="{{ asset('storage/'.$client->company_logo) }}" alt="Logo" style="height:40px;">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ $client->service?->title ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.client.show', $client) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('admin.client.edit', $client) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.client.destroy', $client) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Belum ada client.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection