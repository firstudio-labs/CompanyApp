@extends('admin.layouts.app')

@section('title', 'Edit About')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Informasi Tentang Kami</h4>
    <div class="row">
        <!-- Form Edit -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="aboutForm" action="{{ route('admin.about.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="text_banner" class="form-label">Text Banner</label>
                            <input type="text" class="form-control" id="text_banner" name="text_banner" value="{{ old('text_banner', isset($about) ? $about->text_banner : '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="image_banner" class="form-label">Banner Image</label>
                            <input type="file" class="form-control" id="image_banner" name="image_banner" accept="image/*">
                            @if(isset($about) && !empty($about->image_banner))
                                <img id="current-banner" src="{{ asset($about->image_banner) }}" alt="Current Banner" class="img-fluid mt-2" style="max-height:120px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', isset($about) ? $about->title : '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', isset($about) ? $about->subtitle : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', isset($about) ? $about->description : '') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
                            @if(isset($about) && !empty($about->image_url))
                                <img id="current-image" src="{{ asset($about->image_url) }}" alt="Current Image" class="img-fluid mt-2" style="max-height:120px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', isset($about) ? $about->location : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', isset($about) ? $about->phone : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($about) ? $about->email : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website', isset($about) ? $about->website : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="vision" class="form-label">Visi</label>
                            <input type="text" class="form-control" id="vision" name="vision" value="{{ old('vision', isset($about) ? $about->vision : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="mission" class="form-label">Misi (pisahkan per baris untuk tiap poin)</label>
                            <textarea class="form-control" id="mission" name="mission" rows="3">{{ old('mission', isset($about) ? $about->mission : '') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <img id="preview-banner"
                             src="{{ (isset($about) && !empty($about->image_banner)) ? asset($about->image_banner) : asset('assets/img/placeholder-image.png') }}"
                             alt="Preview Banner"
                             style="width:100%; max-width:220px; height:120px; object-fit:cover; border-radius:8px;">
                        <div class="mt-2">
                            <span class="badge bg-primary fs-6 px-3 py-2" id="preview-text-banner">{{ old('text_banner', isset($about) ? $about->text_banner : '') ?: 'Text Banner' }}</span>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <img id="preview-image"
                             src="{{ (isset($about) && !empty($about->image_url)) ? asset($about->image_url) : asset('assets/img/placeholder-image.png') }}"
                             alt="Preview Gambar"
                             style="width:150px; height:150px; object-fit:cover; border-radius:8px;">
                    </div>
                    <h5 id="preview-title">{{ old('title', isset($about) ? $about->title : '') ?: 'Judul' }}</h5>
                    <h6 id="preview-subtitle" class="text-secondary">{{ old('subtitle', isset($about) ? $about->subtitle : '') ?: 'Sub Judul' }}</h6>
                    <div id="preview-description">{!! old('description', isset($about) ? $about->description : '') ?: 'Deskripsi akan tampil di sini...' !!}</div>
                    <p><strong>Lokasi:</strong> <span id="preview-location">{{ old('location', isset($about) ? $about->location : '') ?: '-' }}</span></p>
                    <p><strong>Telepon:</strong> <span id="preview-phone">{{ old('phone', isset($about) ? $about->phone : '') ?: '-' }}</span></p>
                    <p><strong>Email:</strong> <span id="preview-email">{{ old('email', isset($about) ? $about->email : '') ?: '-' }}</span></p>
                    <p><strong>Website:</strong> <span id="preview-website">{{ old('website', isset($about) ? $about->website : '') ?: '-' }}</span></p>
                    <p><strong>Visi:</strong> <span id="preview-vision">{{ old('vision', isset($about) ? $about->vision : '') ?: '-' }}</span></p>
                    <p><strong>Misi:</strong>
                        <span id="preview-mission">
                            @if(!empty(old('mission', isset($about) ? $about->mission : '')))
                                <ul>
                                    @foreach(preg_split('/\r\n|\r|\n/', old('mission', isset($about) ? $about->mission : '')) as $point)
                                        @if(trim($point) !== '')
                                            <li>{{ $point }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </span>
                    </p>
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

    // Live preview for text_banner
    document.getElementById('text_banner').addEventListener('input', function() {
        document.getElementById('preview-text-banner').textContent = this.value || 'Text Banner';
    });

    // Live preview for subtitle
    document.getElementById('subtitle').addEventListener('input', function() {
        document.getElementById('preview-subtitle').textContent = this.value || 'Sub Judul';
    });

    // Live preview for banner image
    document.getElementById('image_banner').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview-banner');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ (isset($about) && !empty($about->image_banner)) ? asset($about->image_banner) : asset('assets/img/placeholder-image.png') }}";
        }
    });

    // Live preview for text fields
    document.getElementById('title').addEventListener('input', function() {
        document.getElementById('preview-title').textContent = this.value || 'Judul';
    });
    document.getElementById('location').addEventListener('input', function() {
        document.getElementById('preview-location').textContent = this.value || '-';
    });
    document.getElementById('phone').addEventListener('input', function() {
        document.getElementById('preview-phone').textContent = this.value || '-';
    });
    document.getElementById('email').addEventListener('input', function() {
        document.getElementById('preview-email').textContent = this.value || '-';
    });
    document.getElementById('website').addEventListener('input', function() {
        document.getElementById('preview-website').textContent = this.value || '-';
    });
    document.getElementById('vision').addEventListener('input', function() {
        document.getElementById('preview-vision').textContent = this.value || '-';
    });

    // Live preview for CKEditor
    if (window.CKEDITOR) {
        CKEDITOR.instances.description.on('change', function() {
            document.getElementById('preview-description').innerHTML = CKEDITOR.instances.description.getData() || 'Deskripsi akan tampil di sini...';
        });
    }

    // Live preview for mission (per baris jadi list)
    document.getElementById('mission').addEventListener('input', function() {
        const val = this.value;
        const lines = val.split(/\r?\n/).filter(line => line.trim() !== '');
        document.getElementById('preview-mission').innerHTML = lines.length
            ? '<ul>' + lines.map(line => `<li>${line}</li>`).join('') + '</ul>'
            : '-';
    });

    // Live preview for image
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
            preview.src = "{{ (isset($about) && !empty($about->image_url)) ? asset($about->image_url) : asset('assets/img/placeholder-image.png') }}";
        }
    });
</script>
@endsection