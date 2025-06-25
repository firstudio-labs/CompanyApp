@extends('admin.layouts.app')

@section('title', 'Profil Admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Akun /</span> Profil
    </h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profil Admin</h5>
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                        @else
                        <div class="avatar-wrapper">
                            <div class="avatar avatar-xl me-3">
                                <span class="avatar-initial rounded-circle">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        </div>
                        @endif
                        <div class="button-wrapper">
                            <form action="{{ route('admin.profile.update-avatar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                                    <span class="d-none d-sm-block">Upload foto baru</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                <button type="submit" class="btn btn-primary mb-2 d-none" id="upload-btn">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                                @if($user->avatar)
                                <a href="{{ route('admin.profile.remove-avatar') }}" class="btn btn-outline-secondary mb-2" onclick="return confirm('Apakah Anda yakin ingin menghapus foto profil?')">
                                    <i class="bx bx-trash d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Hapus foto</span>
                                </a>
                                @endif
                            </form>
                            <p class="text-muted mb-0">Format: JPG, PNG. Maksimal 2MB</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                                        <i class='bx bx-user me-1'></i> Profil
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security" type="button" role="tab" aria-controls="pills-security" aria-selected="false">
                                        <i class='bx bx-lock-alt me-1'></i> Keamanan
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-activity-tab" data-bs-toggle="pill" data-bs-target="#pills-activity" type="button" role="tab" aria-controls="pills-activity" aria-selected="false">
                                        <i class='bx bx-history me-1'></i> Aktivitas
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h5 class="card-title">Detail Profil</h5>
                                    <form action="{{ route('admin.profile.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}" readonly disabled>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="phone" class="form-label">Telepon</label>
                                                <input class="form-control @error('phone') is-invalid @enderror" type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                                @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="position" class="form-label">Jabatan</label>
                                                <input class="form-control @error('position') is-invalid @enderror" type="text" id="position" name="position" value="{{ old('position', $user->position) }}">
                                                @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="role" class="form-label">Role</label>
                                                <input class="form-control" type="text" id="role" value="{{ ucfirst($user->role) }}" readonly disabled>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="bio" class="form-label">Bio</label>
                                                <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                                                @error('bio')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="address" class="form-label">Alamat</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
                                                @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- Security Tab -->
                                <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab">
                                    <h5 class="card-title">Ubah Password</h5>
                                    <form action="{{ route('admin.profile.update-password') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="current_password" class="form-label">Password Saat Ini</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control @error('current_password') is-invalid @enderror" type="password" id="current_password" name="current_password">
                                                    <span class="input-group-text cursor-pointer toggle-password" data-target="current_password"><i class="bx bx-hide"></i></span>
                                                </div>
                                                @error('current_password')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="password" class="form-label">Password Baru</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password">
                                                    <span class="input-group-text cursor-pointer toggle-password" data-target="password"><i class="bx bx-hide"></i></span>
                                                </div>
                                                @error('password')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation">
                                                    <span class="input-group-text cursor-pointer toggle-password" data-target="password_confirmation"><i class="bx bx-hide"></i></span>
                                                </div>
                                                @error('password_confirmation')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Ubah Password</button>
                                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- Activity Tab -->
                                <div class="tab-pane fade" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                                    <h5 class="card-title">Aktivitas Terakhir</h5>
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="timeline mt-3">
                                                @forelse($activities as $activity)
                                                <li class="timeline-item timeline-item-transparent">
                                                    <span class="timeline-point timeline-point-{{ $activity->action === 'update_profile' ? 'primary' : ($activity->action === 'update_password' ? 'warning' : ($activity->action === 'update_avatar' ? 'success' : 'info')) }}"></span>
                                                    <div class="timeline-event">
                                                        <div class="timeline-header mb-1">
                                                            <h6 class="mb-0">{{ ucfirst(str_replace('_', ' ', $activity->action)) }}</h6>
                                                            <small class="text-muted">{{ $activity->created_at->format('d M Y H:i') }}</small>
                                                        </div>
                                                        <p class="mb-0">{{ $activity->description }}</p>
                                                        <div class="d-flex flex-wrap">
                                                            <div class="me-3">
                                                                <span class="badge bg-label-{{ $activity->action === 'update_profile' ? 'primary' : ($activity->action === 'update_password' ? 'warning' : ($activity->action === 'update_avatar' ? 'success' : 'info')) }}">
                                                                    {{ ucfirst(str_replace('_', ' ', $activity->action)) }}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span class="badge bg-label-secondary">{{ $activity->ip_address }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @empty
                                                <li class="timeline-item timeline-item-transparent">
                                                    <span class="timeline-point timeline-point-info"></span>
                                                    <div class="timeline-event">
                                                        <div class="timeline-header mb-1">
                                                            <h6 class="mb-0">Tidak ada aktivitas</h6>
                                                        </div>
                                                        <p class="mb-0">Belum ada aktivitas yang tercatat</p>
                                                    </div>
                                                </li>
                                                @endforelse
                                                <li class="timeline-end-indicator">
                                                    <i class="bx bx-check-circle"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Show upload button when file is selected
    document.getElementById('upload').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('upload-btn').classList.remove('d-none');
        } else {
            document.getElementById('upload-btn').classList.add('d-none');
        }
    });
    
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function(element) {
        element.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                icon.classList.remove('bx-hide');
                icon.classList.add('bx-show');
            } else {
                targetInput.type = 'password';
                icon.classList.remove('bx-show');
                icon.classList.add('bx-hide');
            }
        });
    });
    
    // Auto close alert after 5 seconds
    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000);
</script>
@endsection

@section('styles')
<style>
    .timeline {
        margin: 0;
        padding: 0;
        list-style: none;
        position: relative;
    }
    .timeline-end-indicator {
        position: relative;
        text-align: center;
        margin-top: 0.5rem;
    }
    .timeline-end-indicator i {
        display: inline-block;
        width: 1.5rem;
        height: 1.5rem;
        line-height: 1.5rem;
        text-align: center;
        border-radius: 50%;
        background-color: #f5f5f9;
        color: #697a8d;
        border: 2px solid #fff;
    }
    .timeline-item {
        position: relative;
        padding-left: 2.5rem;
        border-left: 1px solid #d9dee3;
        margin-bottom: 1.5rem;
    }
    .timeline-item:last-child {
        margin-bottom: 0;
    }
    .timeline-point {
        position: absolute;
        left: -0.5rem;
        top: 0.25rem;
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
        background-color: #fff;
        border: 2px solid;
    }
    .timeline-point-primary {
        border-color: #696cff;
    }
    .timeline-point-success {
        border-color: #71dd37;
    }
    .timeline-point-info {
        border-color: #03c3ec;
    }
    .timeline-event {
        padding-bottom: 1rem;
    }
    .avatar-xl {
        width: 6rem;
        height: 6rem;
    }
    .avatar-initial {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #fff;
        width: 100%;
        height: 100%;
    }
    
    .cursor-pointer {
        cursor: pointer;
    }
</style>
@endsection
