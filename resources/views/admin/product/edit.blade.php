@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Produk /</span> Edit Produk
    </h4>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="productForm" action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $product->title) }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="service_id" class="form-label">Service</label>
                            <select id="service_id" name="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Service --</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id', $product->service_id) == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                                @endforeach
                            </select>
                            @error('service_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tech Stack</label>
                            <div id="tech-stack-group">
                                @php
                                    $oldTechStacks = old('tech_stack_ids', $product->techStacks->pluck('id')->toArray());
                                @endphp
                                @if(count($oldTechStacks))
                                    @foreach($oldTechStacks as $i => $oldId)
                                    <div class="input-group mb-2 tech-stack-row">
                                        <select name="tech_stack_ids[]" class="form-control select-techstack @error('tech_stack_ids.'.$i) is-invalid @enderror">
                                            <option value="">-- Pilih Tech Stack --</option>
                                            @foreach($techStacks as $stack)
                                                <option value="{{ $stack->id }}"
                                                    data-icon="{{ $stack->icon ? asset('storage/'.$stack->icon) : asset('assets/img/placeholder-image.png') }}"
                                                    {{ ($oldId == $stack->id) ? 'selected' : '' }}>
                                                    {{ $stack->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text techstack-icon-preview">
                                            <img src="{{ $techStacks->find($oldId)?->icon ? asset('storage/'.$techStacks->find($oldId)->icon) : asset('assets/img/placeholder-image.png') }}" alt="icon" style="width:24px;height:24px;">
                                        </span>
                                        <button type="button" class="btn btn-outline-{{ $i == 0 ? 'success add-tech-stack' : 'danger remove-tech-stack' }}" title="{{ $i == 0 ? 'Tambah Tech Stack' : 'Hapus' }}">
                                            <i class="bx bx-{{ $i == 0 ? 'plus' : 'minus' }}"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2 tech-stack-row">
                                        <select name="tech_stack_ids[]" class="form-control select-techstack">
                                            <option value="">-- Pilih Tech Stack --</option>
                                            @foreach($techStacks as $stack)
                                                <option value="{{ $stack->id }}"

                                                    {{ ($oldId == $stack->id) ? 'selected' : '' }}>
                                                    {{ $stack->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text techstack-icon-preview">
                                            <img src="{{ asset('assets/img/placeholder-image.png') }}" alt="icon" style="width:24px;height:24px;">
                                        </span>
                                        <button type="button" class="btn btn-outline-success add-tech-stack" title="Tambah Tech Stack"><i class="bx bx-plus"></i></button>
                                    </div>
                                @endif
                            </div>
                            @error('tech_stack_ids.*')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $product->link) }}">
                            @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" accept="image/*">
                            @if($product->image_url)
                                <div class="mt-2">
                                    <img id="current-image" src="{{ asset('images/products/' . $product->image_url) }}" alt="{{ $product->title }}" style="width:100px; height:100px; object-fit:cover;">
                                </div>
                            @endif
                            @error('image_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview Produk</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img id="preview-image" src="{{ $product->image_url ? asset('images/products/' . $product->image_url) : asset('assets/img/placeholder-image.png') }}" alt="Preview Gambar" style="width:150px; height:150px; object-fit:cover; border-radius:8px;">
                    </div>
                    <h5 id="preview-title">{{ old('title', $product->title) ?: 'Judul Produk' }}</h5>
                    <p><strong>Service:</strong> <span id="preview-service">
                        {{ $services->find(old('service_id', $product->service_id))?->title ?? '-' }}
                    </span></p>
                    <p><strong>Deskripsi:</strong> <span id="preview-description">
                        {{ \Illuminate\Support\Str::limit(strip_tags(old('description', $product->description)), 100) ?: '-' }}
                    </span></p>
                    <p><strong>Link:</strong> <span id="preview-link">{{ old('link', $product->link) ?: '-' }}</span></p>
                    <p><strong>Tech Stack:</strong> <span id="preview-techstack">
                        @php
                            $selected = old('tech_stack_ids', $product->techStacks->pluck('id')->toArray());
                            $names = $techStacks->whereIn('id', $selected)->pluck('name')->toArray();
                        @endphp
                        {{ $names ? implode(', ', $names) : '-' }}
                    </span></p>
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

    // Data service untuk preview
    const serviceMap = {
        @foreach($services as $service)
            "{{ $service->id }}": "{{ $service->title }}",
        @endforeach
    };

    document.getElementById('title').addEventListener('input', function() {
        document.getElementById('preview-title').textContent = this.value || 'Judul Produk';
    });
    document.getElementById('service_id').addEventListener('change', function() {
        document.getElementById('preview-service').textContent = serviceMap[this.value] || '-';
    });
    document.getElementById('description').addEventListener('input', function() {
        document.getElementById('preview-description').textContent = this.value || '-';
    });
    document.getElementById('link').addEventListener('input', function() {
        document.getElementById('preview-link').textContent = this.value || '-';
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
            preview.src = "{{ $product->image_url ? asset('images/products/' . $product->image_url) : asset('assets/img/placeholder-image.png') }}";
        }
    });

    // CKEditor live preview
    if (window.CKEDITOR) {
        CKEDITOR.instances.description.on('change', function() {
            document.getElementById('preview-description').textContent = CKEDITOR.instances.description.getData() || '-';
        });
    }

    // Tech stack preview
    document.getElementById('tech_stack_ids').addEventListener('change', function() {
        let preview = document.getElementById('techstack-preview');
        preview.innerHTML = '';
        Array.from(this.selectedOptions).forEach(opt => {
            let icon = opt.getAttribute('data-icon');
            let span = document.createElement('span');
            span.className = 'badge bg-info text-dark';
            span.style.marginRight = '2px';
            span.innerHTML = (icon ? `<img src="${icon}" style="width:16px;height:16px;object-fit:contain;margin-right:2px;">` : '') + opt.text;
            preview.appendChild(span);
        });
    });
</script>
@endsection
