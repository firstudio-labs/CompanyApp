@extends('admin.layouts.app')

@section('title', 'Tambah Tech Stack')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tech Stack /</span> Tambah Tech Stack
    </h4>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.techstack.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required id="name">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon (Upload Gambar)</label>
                            <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" accept="image/*" id="icon">
                            @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                                <option value="">- Pilih Kategori -</option>
                                @foreach(\App\Models\Category::all() as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" id="description">{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.techstack.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button class="btn btn-primary"><i class="bx bx-save me-1"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-light">
                    <strong>Preview</strong>
                </div>
                <div class="card-body text-center">
                    <img id="preview-icon" src="{{ asset('assets/img/placeholder-image.png') }}" alt="Preview Icon" class="img-fluid mb-3 rounded" style="max-height:100px;">
                    <h5 id="preview-name" class="mb-1 text-primary">{{ old('name') ?: 'Nama Tech Stack' }}</h5>
                    <div class="small text-muted mb-2" id="preview-category">
                        {{ old('category_id') ? \App\Models\Category::find(old('category_id'))->name : '-' }}
                    </div>
                    <div class="text-muted" id="preview-description">{{ old('description') ?: 'Deskripsi akan tampil di sini...' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('icon').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview-icon');
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
    document.getElementById('name').addEventListener('input', function() {
        document.getElementById('preview-name').textContent = this.value || 'Nama Tech Stack';
    });
    document.getElementById('category_id').addEventListener('change', function() {
        let selected = this.options[this.selectedIndex];
        document.getElementById('preview-category').textContent = selected.value ? selected.text : '-';
    });
    document.getElementById('description').addEventListener('input', function() {
        document.getElementById('preview-description').textContent = this.value || 'Deskripsi akan tampil di sini...';
    });
});
</script>
@endsection