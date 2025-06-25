@extends('admin.layouts.app')

@section('title', 'Detail Pesan Kontak')

@section('styles')
<style>
    .message-card {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border-radius: 0.5rem;
        transition: all 0.3s;
    }
    
    .message-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    
    .message-header {
        border-radius: 0.5rem 0.5rem 0 0;
    }
    
    .message-body {
        border-radius: 0 0 0.5rem 0.5rem;
        border-color: #eaeaea !important;
    }
    
    .message-content {
        line-height: 1.8;
    }
    
    .badge-status {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }
    
    .sender-info {
        line-height: 1.7;
    }
    
    .sender-info .info-item {
        padding: 0.75rem;
        border-radius: 0.5rem;
        margin-bottom: 0.75rem;
        background-color: rgba(255, 255, 255, 0.7);
        transition: all 0.2s;
    }
    
    .sender-info .info-item:hover {
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    
    .avatar-circle {
        height: 60px;
        width: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        font-weight: 600;
    }
    
    .reply-form {
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .action-button {
        transition: all 0.2s;
    }
    
    .action-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .bg-overlay-unread {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0.5rem;
        border-radius: 0 0.5rem 0 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .timeline {
        position: relative;
        padding-left: 1.5rem;
    }
    
    .timeline:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 2px;
        background-color: #e9ecef;
    }
    
    .timeline-item {
        position: relative;
        padding-bottom: 1.5rem;
    }
    
    .timeline-item:last-child {
        padding-bottom: 0;
    }
    
    .timeline-item:before {
        content: '';
        position: absolute;
        left: -1.5rem;
        top: 0.25rem;
        height: 12px;
        width: 12px;
        border-radius: 50%;
        background-color: #696cff;
        border: 2px solid #fff;
    }
</style>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
        <div>
            <span class="text-muted fw-light">Kontak / <a href="{{ route('admin.contact.index') }}" class="text-muted">Daftar Pesan</a> /</span> Detail Pesan
        </div>
        <div>
            @if($contact->status == 'unread')
            <span class="badge bg-warning badge-status">
                <i class="bx bx-envelope me-1"></i> Belum Dibaca
            </span>
            @elseif($contact->status == 'read')
            <span class="badge bg-info badge-status">
                <i class="bx bx-envelope-open me-1"></i> Sudah Dibaca
            </span>
            @else
            <span class="badge bg-success badge-status">
                <i class="bx bx-check-circle me-1"></i> Sudah Dibalas
            </span>
            @endif
        </div>
    </h4>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="d-flex">
            <i class="bx bx-check-circle me-2 bx-sm"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Alert Error -->
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="d-flex">
            <i class="bx bx-error-circle me-2 bx-sm"></i>
            <div>{{ session('error') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <!-- Sender Information Column -->
        <div class="col-lg-4 col-md-5 order-md-1 order-2 mt-md-0 mt-4">
            <div class="card mb-4">
                <div class="card-body text-center pt-4 pb-3">
                    <div class="avatar avatar-xl mx-auto mb-3 bg-label-{{ $contact->status == 'unread' ? 'warning' : ($contact->status == 'read' ? 'info' : 'success') }}">
                        <span class="avatar-initial rounded-circle avatar-circle">{{ substr($contact->name, 0, 1) }}</span>
                    </div>
                    <h5 class="mb-1">{{ $contact->name }}</h5>
                    <span class="badge bg-label-{{ $contact->status == 'unread' ? 'warning' : ($contact->status == 'read' ? 'info' : 'success') }} mb-3">
                        {{ $contact->status == 'unread' ? 'Belum Dibaca' : ($contact->status == 'read' ? 'Sudah Dibaca' : 'Sudah Dibalas') }}
                    </span>
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <a href="mailto:{{ $contact->email }}" class="btn btn-sm btn-primary">
                            <i class="bx bx-envelope me-1"></i> Email
                        </a>
                        <a href="tel:{{ $contact->phone }}" class="btn btn-sm btn-secondary">
                            <i class="bx bx-phone me-1"></i> Telepon
                        </a>
                    </div>
                </div>
                <hr class="m-0">
                <div class="card-body pt-3">
                    <div class="sender-info">
                        <div class="info-item">
                            <small class="text-muted d-block mb-1">Email</small>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-envelope text-primary me-2"></i>
                                <span>{{ $contact->email }}</span>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <small class="text-muted d-block mb-1">Telepon</small>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-phone text-primary me-2"></i>
                                <span>{{ $contact->phone }}</span>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <small class="text-muted d-block mb-1">Dikirim pada</small>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-calendar text-primary me-2"></i>
                                <span>{{ $contact->created_at instanceof \DateTime ? $contact->created_at->format('d M Y') : $contact->created_at }}</span>
                            </div>
                            <div class="d-flex align-items-center mt-1">
                                <i class="bx bx-time text-primary me-2"></i>
                                <span>{{ $contact->created_at instanceof \DateTime ? $contact->created_at->format('H:i') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Message History -->
            @if($contact->status == 'read' || $contact->status == 'replied')
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-history me-2"></i>Riwayat Pesan</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <h6 class="mb-1">Pesan diterima</h6>
                            <p class="text-muted mb-0 small">
                                <i class="bx bx-calendar-check me-1"></i> {{ $contact->created_at instanceof \DateTime ? $contact->created_at->format('d M Y H:i') : $contact->created_at }}
                            </p>
                        </div>
                        
                        <div class="timeline-item">
                            <h6 class="mb-1">Pesan dibaca</h6>
                            <p class="text-muted mb-0 small">
                                <i class="bx bx-calendar-check me-1"></i> {{ $contact->read_at ? ($contact->read_at instanceof \DateTime ? $contact->read_at->format('d M Y H:i') : $contact->read_at) : '-' }}
                            </p>
                        </div>
                        
                        @if($contact->status == 'replied')
                        <div class="timeline-item">
                            <h6 class="mb-1">Pesan dibalas</h6>
                            <p class="text-muted mb-0 small">
                                <i class="bx bx-calendar-check me-1"></i> {{ $contact->updated_at instanceof \DateTime ? $contact->updated_at->format('d M Y H:i') : $contact->updated_at }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            
            <!-- Action Buttons -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bx bx-cog me-2"></i>Tindakan</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary action-button">
                            <i class="bx bx-arrow-back me-1"></i> Kembali ke Daftar
                        </a>
                        
                        <button type="button" class="btn btn-danger action-button" id="deleteButton">
                            <i class="bx bx-trash me-1"></i> Hapus Pesan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message Content Column -->
        <div class="col-lg-8 col-md-7 order-md-2 order-1">
            <!-- Original Message -->
            <div class="message-card mb-4 position-relative">
                @if($contact->status == 'unread')
                <div class="bg-warning text-white bg-overlay-unread">
                    <i class="bx bx-envelope me-1"></i> Belum Dibaca
                </div>
                @endif
                
                <div class="message-header bg-primary text-white p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bx bx-message-detail me-2"></i>{{ $contact->subject }}</h5>
                        <span class="small"><i class="bx bx-time me-1"></i>{{ $contact->created_at instanceof \DateTime ? $contact->created_at->diffForHumans() : '' }}</span>
                    </div>
                </div>
                <div class="message-body p-4 border">
                    <div class="message-content mb-0">
                        {!! nl2br(e($contact->message)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Auto close alert after 5 seconds
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
    
    // Handle delete confirmation
    document.getElementById('deleteButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: "Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create a form dynamically and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('admin.contact.destroy', $contact->id) }}";
                form.style.display = 'none';
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = "{{ csrf_token() }}";
                
                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>
@endsection 