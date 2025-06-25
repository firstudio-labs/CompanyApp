@extends('admin.layouts.app')

@section('title', 'Detail Slide')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Slide /</span> Detail Slide
    </h4>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <img src="{{ $slide->image_url }}" alt="Gambar" style="max-width: 200px; max-height: 200px;">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    {{ $slide->title }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Subjudul</label>
                <div class="col-sm-10">
                    {{ $slide->subtitle }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Order</label>
                <div class="col-sm-10">
                    {{ $slide->order }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    {!! $slide->is_active ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Nonaktif</span>' !!}
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.slide.edit', $slide) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('admin.slide.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
