@extends('admin.layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Layanan /</span> Tambah Layanan
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
                    <form id="serviceForm" action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" rows="5">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image_banner" class="form-label">Banner</label>
                            <input type="file" class="form-control @error('image_banner') is-invalid @enderror"
                                id="image_banner" name="image_banner" accept="image/*">
                            @error('image_banner')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('image_url') is-invalid @enderror"
                                id="image_url" name="image_url" accept="image/*">
                            @error('image_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.service.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Layanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview Layanan</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img id="preview-image" src="{{ asset('assets/img/placeholder-image.png') }}" alt="Preview Gambar" style="width:150px; height:150px; object-fit:cover; border-radius:8px;">
                    </div>
                    <h5 id="preview-title">Judul Layanan</h5>
                    <div id="preview-description" class="mb-2 text-muted">Deskripsi akan tampil di sini...</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 200
    });

    document.getElementById('title').addEventListener('input', function() {
        document.getElementById('preview-title').textContent = this.value || 'Judul Layanan';
    });

    // CKEditor live preview
    if (window.CKEDITOR) {
        CKEDITOR.instances.description.on('change', function() {
            document.getElementById('preview-description').innerHTML = CKEDITOR.instances.description.getData() || 'Deskripsi akan tampil di sini...';
        });
    }

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
</script>
@endsection
