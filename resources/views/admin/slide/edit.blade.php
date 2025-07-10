@extends('admin.layouts.app')

@section('title', 'Edit Slide')

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
        <span class="text-muted fw-light">Slide /</span> Edit Slide
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
                    <form action="{{ route('admin.slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $slide->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subjudul</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $slide->subtitle) }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $slide->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="button_text" class="form-label">Teks Tombol</label>
                            <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $slide->button_text) }}">
                        </div>
                        <div class="mb-3">
                            <label for="button_link" class="form-label">Link Tombol</label>
                            <input type="text" class="form-control" id="button_link" name="button_link" value="{{ old('button_link', $slide->button_link) }}">
                        </div>
                        <div class="mb-3">
                            <label for="order" class="form-label">Urutan</label>
                            <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $slide->order) }}">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $slide->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Aktif</label>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.slide.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview Slide</h5>
                </div>
                <div class="card-body">
                    <img id="preview-image" src="{{ $slide->image_url }}" alt="Preview Gambar" class="preview-image" style="display:block;">
                    <h5 id="preview-title">{{ old('title', $slide->title) ?: 'Judul Slide' }}</h5>
                    <div class="text-muted mb-2" id="preview-subtitle">{{ old('subtitle', $slide->subtitle) ?: 'Subjudul' }}</div>
                    <div class="mb-2" id="preview-description">{!! old('description', $slide->description) ?: 'Deskripsi slide akan tampil di sini...' !!}</div>
                    <div class="small text-muted" id="preview-button">
                        <a href="#" class="btn btn-primary btn-sm" id="preview-button-link">{{ old('button_text', $slide->button_text) ?: 'Teks Tombol' }}</a>
                    </div>
                    <div class="mt-2"><span class="badge" id="preview-status">{{ old('is_active', $slide->is_active) ? 'Aktif' : 'Nonaktif' }}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('title').addEventListener('input', function() {
        document.getElementById('preview-title').textContent = this.value || 'Judul Slide';
    });
    document.getElementById('subtitle').addEventListener('input', function() {
        document.getElementById('preview-subtitle').textContent = this.value || 'Subjudul';
    });
    document.getElementById('description').addEventListener('input', function() {
        document.getElementById('preview-description').innerHTML = this.value.replace(/\n/g, '<br>') || 'Deskripsi slide akan tampil di sini...';
    });
    document.getElementById('button_text').addEventListener('input', function() {
        document.getElementById('preview-button-link').textContent = this.value || 'Teks Tombol';
    });
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview-image');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ $slide->image ? asset('storage/'.$slide->image) : asset('assets/img/placeholder-image.png') }}";
        }
    });
    document.getElementById('is_active').addEventListener('change', function() {
        document.getElementById('preview-status').textContent = this.checked ? 'Aktif' : 'Nonaktif';
        document.getElementById('preview-status').className = 'badge ' + (this.checked ? 'bg-success' : 'bg-secondary');
    });
</script>
@endsection