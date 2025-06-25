@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Client</h1>
    <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Perusahaan</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
            @error('company_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Logo (Upload Gambar)</label>
            <input type="file" name="company_logo" class="form-control @error('company_logo') is-invalid @enderror" accept="image/*" id="company_logo">
            @error('company_logo') <div class="text-danger">{{ $message }}</div> @enderror
            <div class="mt-2">
                <img id="preview-logo" src="{{ asset('assets/img/placeholder-image.png') }}" alt="Preview Logo" style="height:60px;">
            </div>
        </div>
        <div class="mb-3">
            <label>Layanan</label>
            <select name="service_id" class="form-control">
                <option value="">- Pilih Layanan -</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                @endforeach
            </select>
            @error('service_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.client.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
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
</script>
@endsection