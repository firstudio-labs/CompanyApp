@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Client</h1>
    <div class="mb-3">
        <strong>Nama Perusahaan:</strong> {{ $client->company_name }}
    </div>
    <div class="mb-3">
        <strong>Logo:</strong><br>
        @if($client->company_logo)
            <img src="{{ asset('storage/'.$client->company_logo) }}" alt="Logo" style="height:60px;">
        @else
            <span class="text-muted">-</span>
        @endif
    </div>
    <div class="mb-3">
        <strong>Layanan:</strong> {{ $client->service?->title ?? '-' }}
    </div>
    <a href="{{ route('admin.client.edit', $client) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('admin.client.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection