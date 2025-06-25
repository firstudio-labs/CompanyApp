@extends('admin.layouts.app')

@section('title', 'Tambah Artikel')

@section('styles')
<style>
    .preview-image {
        max-height: 200px;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        margin-bottom: 1rem;
        display: block;
    }
</style>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Artikel /</span> Tambah Artikel
    </h4>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <!-- Form -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="articleForm" action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subjudul</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Konten</label>
                            <textarea class="form-control" id="content" name="content" rows="6">{{ old('content') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
                        </div>
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Tanggal Publikasi</label>
                            <input type="date" class="form-control" id="published_at" name="published_at" value="{{ old('published_at') }}">
                        </div>
                        <div class="mb-3">
                            <label for="service_id" class="form-label">Layanan</label>
                            <select class="form-select" id="service_id" name="service_id">
                                <option value="">Pilih Layanan</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.article.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview Artikel</h5>
                </div>
                <div class="card-body">
                    <img id="preview-image" src="{{ asset('assets/img/placeholder-image.png') }}" alt="Preview Gambar" class="preview-image" style="display:block;">
                    <h5 id="preview-title">Judul Artikel</h5>
                    <div class="text-muted mb-2" id="preview-subtitle">Subjudul</div>
                    <div class="mb-2" id="preview-content">Konten artikel akan tampil di sini...</div>
                    <div class="small text-muted" id="preview-author">Penulis: -</div>
                    <div class="small text-muted" id="preview-date">Tanggal: -</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // CKEditor
    CKEDITOR.replace('content', {
        height: 300
    });

    // Live preview
    document.getElementById('title').addEventListener('input', function() {
        document.getElementById('preview-title').textContent = this.value || 'Judul Artikel';
    });
    document.getElementById('subtitle').addEventListener('input', function() {
        document.getElementById('preview-subtitle').textContent = this.value || 'Subjudul';
    });
    document.getElementById('author').addEventListener('input', function() {
        document.getElementById('preview-author').textContent = 'Penulis: ' + (this.value || '-');
    });
    document.getElementById('published_at').addEventListener('input', function() {
        document.getElementById('preview-date').textContent = 'Tanggal: ' + (this.value || '-');
    });
    document.getElementById('image_url').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview-image');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ asset('assets/img/placeholder-image.png') }}";
        }
    });
    // CKEditor live preview
    if (window.CKEDITOR) {
        CKEDITOR.instances.content.on('change', function() {
            document.getElementById('preview-content').innerHTML = CKEDITOR.instances.content.getData() || 'Konten artikel akan tampil di sini...';
        });
    }
</script>
@endsection