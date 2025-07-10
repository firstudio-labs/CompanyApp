@extends('admin.layouts.app')

@section('title', 'Tambah Portfolio')

@section('styles')
<style>
    .tech-stack-row {
        position: relative;
    }
    
    .techstack-icon-preview {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }
    
    .techstack-icon-preview img {
        border-radius: 2px;
    }
    
    .select-techstack:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .badge {
        font-size: 0.75rem;
    }
    
    .badge img {
        vertical-align: middle;
    }
    
    .preview-card {
        border: 1px solid #e9ecef;
        border-radius: 0.5rem;
    }
    
    .preview-image {
        transition: all 0.3s ease;
    }
    
    .preview-image:hover {
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Portfolio /</span> Tambah Portfolio
    </h4>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="portfolioForm" action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="service_id" class="form-label">Service</label>
                            <select id="service_id" name="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Service --</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                                @endforeach
                            </select>
                            @error('service_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tech Stack</label>
                            <div id="tech-stack-group">
                                @php
                                    $oldTechStacks = old('tech_stack_ids', []);
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
                                                    data-icon="{{ $stack->icon ? asset('storage/'.$stack->icon) : asset('assets/img/placeholder-image.png') }}">
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
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}">
                            @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" accept="image/*">
                            @error('image_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return validateForm()">Simpan</button>
                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview Portfolio</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img id="preview-image" src="{{ asset('assets/img/placeholder-image.png') }}" alt="Preview Gambar" style="width:150px; height:150px; object-fit:cover; border-radius:8px;">
                    </div>
                    <h5 id="preview-title">{{ old('title') ?: 'Judul Portfolio' }}</h5>
                    <p><strong>Service:</strong> <span id="preview-service">
                        {{ $services->find(old('service_id'))?->title ?? '-' }}
                    </span></p>
                    <p><strong>Tech Stack:</strong> <span id="preview-techstack">
                        @php
                            $selected = old('tech_stack_ids', []);
                            $names = $techStacks->whereIn('id', $selected)->pluck('name')->toArray();
                        @endphp
                        {{ $names ? implode(', ', $names) : '-' }}
                    </span></p>
                    <p><strong>Deskripsi:</strong> <span id="preview-description">
                        {{ \Illuminate\Support\Str::limit(strip_tags(old('description')), 100) ?: '-' }}
                    </span></p>
                    <p><strong>Link:</strong> <span id="preview-link">{{ old('link') ?: '-' }}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', { height: 200 });

    const serviceMap = {
        @foreach($services as $service)
            "{{ $service->id }}": "{{ $service->title }}",
        @endforeach
    };
    const techStackMap = {
        @foreach($techStacks as $stack)
            "{{ $stack->id }}": "{{ $stack->name }}",
        @endforeach
    };

    document.getElementById('title').addEventListener('input', function() {
        document.getElementById('preview-title').textContent = this.value || 'Judul Portfolio';
    });
    document.getElementById('service_id').addEventListener('change', function() {
        document.getElementById('preview-service').textContent = serviceMap[this.value] || '-';
    });
    // Update preview techstack
    function updateTechStackPreview() {
        let selects = document.querySelectorAll('.select-techstack');
        let selected = Array.from(selects).map(sel => techStackMap[sel.value]).filter(Boolean);
        document.getElementById('preview-techstack').textContent = selected.length ? selected.join(', ') : '-';
    }
    
    document.getElementById('tech-stack-group').addEventListener('change', updateTechStackPreview);
    document.getElementById('description').addEventListener('input', function() {
        let val = this.value || '-';
        document.getElementById('preview-description').textContent = val.length > 100 ? val.substring(0, 100) + '...' : val;
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
            preview.src = "{{ asset('assets/img/placeholder-image.png') }}";
        }
    });

    // CKEditor preview (limit 100 chars, strip HTML)
    if (window.CKEDITOR) {
        CKEDITOR.instances.description.on('change', function() {
            let html = CKEDITOR.instances.description.getData() || '-';
            let div = document.createElement('div');
            div.innerHTML = html;
            let text = div.textContent || div.innerText || '';
            if (text.length > 100) text = text.substring(0, 100) + '...';
            document.getElementById('preview-description').textContent = text || '-';
        });
    }

    // Tech stack dynamic add/remove
    document.getElementById('tech-stack-group').addEventListener('click', function(e) {
        if (e.target.classList.contains('add-tech-stack') || e.target.closest('.add-tech-stack')) {
            e.preventDefault();
            let row = document.createElement('div');
            row.className = 'input-group mb-2 tech-stack-row';
            let select = document.createElement('select');
            select.name = "tech_stack_ids[]";
            select.className = "form-control select-techstack";
            let opt = document.createElement('option');
            opt.value = '';
            opt.textContent = '-- Pilih Tech Stack --';
            select.appendChild(opt);
            @foreach($techStacks as $stack)
                var option = document.createElement('option');
                option.value = "{{ $stack->id }}";
                option.textContent = "{{ $stack->name }}";
                option.setAttribute('data-icon', "{{ $stack->icon ? asset('storage/'.$stack->icon) : asset('assets/img/placeholder-image.png') }}");
                select.appendChild(option);
            @endforeach
            let iconPreview = document.createElement('span');
            iconPreview.className = 'input-group-text techstack-icon-preview';
            let img = document.createElement('img');
            img.src = "{{ asset('assets/img/placeholder-image.png') }}";
            img.style.width = '24px';
            img.style.height = '24px';
            iconPreview.appendChild(img);
            let btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'btn btn-outline-danger remove-tech-stack';
            btn.title = 'Hapus';
            btn.innerHTML = '<i class="bx bx-minus"></i>';
            row.appendChild(select);
            row.appendChild(iconPreview);
            row.appendChild(btn);
            this.appendChild(row);
            updateTechStackPreview();
        }
        if (e.target.classList.contains('remove-tech-stack') || e.target.closest('.remove-tech-stack')) {
            e.preventDefault();
            let row = e.target.closest('.tech-stack-row');
            if (row) {
                row.remove();
                updateTechStackPreview();
            }
        }
    });

    // Update icon preview when select changes
    document.getElementById('tech-stack-group').addEventListener('change', function(e) {
        if (e.target.classList.contains('select-techstack')) {
            let select = e.target;
            let selectedOption = select.options[select.selectedIndex];
            let iconUrl = selectedOption.getAttribute('data-icon') || "{{ asset('assets/img/placeholder-image.png') }}";
            let iconPreview = select.parentElement.querySelector('.techstack-icon-preview img');
            if (iconPreview) iconPreview.src = iconUrl;
            
            // Check for duplicates
            let selectedValue = select.value;
            let allSelects = document.querySelectorAll('.select-techstack');
            let duplicates = Array.from(allSelects).filter(s => s.value === selectedValue && s !== select);
            
            if (duplicates.length > 0 && selectedValue !== '') {
                alert('Tech Stack ini sudah dipilih!');
                select.value = '';
                iconPreview.src = "{{ asset('assets/img/placeholder-image.png') }}";
                return;
            }
        }
    });

    // Inisialisasi icon preview untuk select yang sudah ada (old value)
    document.querySelectorAll('.select-techstack').forEach(function(select) {
        let selectedOption = select.options[select.selectedIndex];
        let iconUrl = selectedOption ? selectedOption.getAttribute('data-icon') : "{{ asset('assets/img/placeholder-image.png') }}";
        let iconPreview = select.parentElement.querySelector('.techstack-icon-preview img');
        if (iconPreview) iconPreview.src = iconUrl;
    });

    // Form validation
    function validateForm() {
        let selects = document.querySelectorAll('.select-techstack');
        let selectedValues = Array.from(selects).map(sel => sel.value).filter(Boolean);
        
        if (selectedValues.length === 0) {
            alert('Pilih minimal satu Tech Stack!');
            return false;
        }
        
        // Check for duplicates
        let uniqueValues = [...new Set(selectedValues)];
        if (uniqueValues.length !== selectedValues.length) {
            alert('Tech Stack tidak boleh duplikat!');
            return false;
        }
        
        return true;
    }
</script>
@endsection
