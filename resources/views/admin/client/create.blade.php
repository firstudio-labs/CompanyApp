@extends('admin.layouts.app')

@section('title', 'Tambah Client')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Client /</span> Tambah Client
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
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Nama Perusahaan</label>
                            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}" required>
                            @error('company_name') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="company_logo" class="form-label">Logo Perusahaan</label>
                            <input type="file" name="company_logo" id="company_logo" class="form-control @error('company_logo') is-invalid @enderror" accept="image/*">
                            @error('company_logo') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="service_id" class="form-label">Layanan</label>
                            <select name="service_id" id="service_id" class="form-select">
                                <option value="">Pilih Layanan</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.client.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i> Simpan Client
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-show-alt text-primary me-2"></i> Preview Client</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img id="preview-logo" src="{{ asset('assets/img/placeholder-image.png') }}" alt="Preview Logo" 
                             class="rounded shadow-sm" style="max-width: 120px; max-height: 120px; object-fit: contain;">
                    </div>
                    <h6 id="preview-company-name" class="fw-bold">{{ old('company_name') ?: 'Nama Perusahaan' }}</h6>
                    <div class="mb-2">
                        <span class="badge bg-info" id="preview-service">{{ old('service_id') ? 'Layanan Terpilih' : 'Belum memilih layanan' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Live preview untuk nama perusahaan
    document.getElementById('company_name').addEventListener('input', function() {
        document.getElementById('preview-company-name').textContent = this.value || 'Nama Perusahaan';
    });

    // Live preview untuk logo
    document.getElementById('company_logo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview-logo');
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

    // Live preview untuk layanan
    document.getElementById('service_id').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        document.getElementById('preview-service').textContent = selected.text || 'Belum memilih layanan';
    });
</script>
@endsection