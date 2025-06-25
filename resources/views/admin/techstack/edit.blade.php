@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0"><i class="bx bx-edit-alt me-2"></i> Edit Tech Stack</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.techstack.update', $techstack) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $techstack->name) }}" required id="name">
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Icon (Upload Gambar)</label>
                                    <input type="file" name="icon" class="form-control" accept="image/*" id="icon">
                                    @error('icon') <div class="text-danger">{{ $message }}</div> @enderror
                                    @if($techstack->icon)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$techstack->icon) }}" alt="icon" class="img-thumbnail" style="max-height:60px;">
                                            <div class="small text-muted">Icon saat ini</div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        <option value="">- Pilih Kategori -</option>
                                        @foreach(\App\Models\Category::all() as $cat)
                                            <option value="{{ $cat->id }}" {{ (old('category_id', $techstack->category_id) == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="description" class="form-control" rows="3" id="description">{{ old('description', $techstack->description) }}</textarea>
                                    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-warning"><i class="bx bx-save me-1"></i> Update</button>
                                    <a href="{{ route('admin.techstack.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border shadow-sm">
                                    <div class="card-header bg-light">
                                        <strong>Preview</strong>
                                    </div>
                                    <div class="card-body text-center">
                                        <img id="preview-icon" src="{{ $techstack->icon ? asset('storage/'.$techstack->icon) : asset('assets/img/placeholder-image.png') }}" alt="Preview Icon" class="img-fluid mb-3 rounded" style="max-height:100px;">
                                        <h5 id="preview-name" class="mb-1 text-primary">{{ old('name', $techstack->name) ?: 'Nama Tech Stack' }}</h5>
                                        <div class="small text-muted mb-2" id="preview-category">
                                            {{ old('category_id', $techstack->category_id) ? \App\Models\Category::find(old('category_id', $techstack->category_id))->name : '-' }}
                                        </div>
                                        <div class="text-muted" id="preview-description">{{ old('description', $techstack->description) ?: 'Deskripsi akan tampil di sini...' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
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
            preview.src = "{{ $techstack->icon ? asset('storage/'.$techstack->icon) : asset('assets/img/placeholder-image.png') }}";
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
@endpush