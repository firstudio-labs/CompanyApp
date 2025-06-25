@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><i class="bx bx-info-circle me-2"></i> Detail Tech Stack</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        @if($techstack->icon)
                            <img src="{{ asset('storage/'.$techstack->icon) }}" alt="icon" class="img-thumbnail mb-2" style="max-height:100px;">
                        @else
                            <img src="{{ asset('assets/img/placeholder-image.png') }}" alt="icon" class="img-thumbnail mb-2" style="max-height:100px;">
                        @endif
                    </div>
                    <table class="table table-borderless">
                        <tr>
                            <th width="120">Nama</th>
                            <td>{{ $techstack->name }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $techstack->category?->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $techstack->description }}</td>
                        </tr>
                    </table>
                    <div class="mt-4">
                        <a href="{{ route('admin.techstack.edit', $techstack) }}" class="btn btn-warning"><i class="bx bx-edit"></i> Edit</a>
                        <a href="{{ route('admin.techstack.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection