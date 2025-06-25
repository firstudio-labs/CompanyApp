@extends('admin.layouts.app')

@section('title', 'Kelola Pesan Kontak')

@section('styles')
    <style>
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .status-badge {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
            border-radius: 50rem;
        }

        .avatar-container {
            width: 45px;
            height: 45px;
            flex-shrink: 0;
        }

        .contact-row {
            transition: all 0.2s;
        }

        .contact-row:hover {
            background-color: rgba(105, 108, 255, 0.08) !important;
        }

        .contact-row.unread {
            border-left: 3px solid #ffab00;
        }

        .contact-row.read {
            border-left: 3px solid #03c3ec;
        }

        .card-statistic {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .card-statistic:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .statistic-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .search-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(105, 108, 255, 0.1);
        }

        .filter-form {
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .7;
            }
        }

        .card-footer {
            background-color: transparent;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .checkbox-animated {
            transition: all 0.2s;
        }

        .checkbox-animated:checked {
            transform: scale(1.2);
        }

        .dropdown-menu-custom {
            min-width: 180px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .dropdown-item-danger {
            color: #dc3545;
        }

        .dropdown-item-danger:hover {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        #bulkDeleteBtn {
            transition: all 0.3s ease;
        }

        #bulkDeleteBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
            <div>
                <span class="text-muted fw-light">Kontak /</span> Kelola Pesan
            </div>

        </h4>

        <!-- Alert Success -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <i class="bx bx-check-circle me-2 bx-sm"></i>
                    <div>{{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Alert Error -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                    <i class="bx bx-error-circle me-2 bx-sm"></i>
                    <div>{{ session('error') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Status Cards -->
        <div class="row mb-4">
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card card-statistic bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-white mb-0">Total Pesan</h5>
                                <h2 class="fw-bold text-white my-2">{{ $statusCounts['total'] ?? 0 }}</h2>
                                <p class="mb-0 text-white-50">Semua pesan kontak</p>
                            </div>
                            <div class="statistic-icon bg-white text-primary">
                                <i class="bx bx-envelope fs-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-2">
                        <a href="{{ route('admin.contact.index') }}"
                            class="text-white d-flex justify-content-between align-items-center">
                            <span>Lihat Semua</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card card-statistic bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-white mb-0">Belum Dibaca</h5>
                                <h2 class="fw-bold text-white my-2">{{ $statusCounts['unread'] ?? 0 }}</h2>
                                <p class="mb-0 text-white-50">Perlu perhatian segera</p>
                            </div>
                            <div class="statistic-icon bg-white text-warning">
                                <i class="bx bx-envelope fs-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-2">
                        <a href="{{ route('admin.contact.index', ['status' => 'unread']) }}"
                            class="text-white d-flex justify-content-between align-items-center">
                            <span>Lihat Belum Dibaca</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card card-statistic bg-info text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-white mb-0">Sudah Dibaca</h5>
                                <h2 class="fw-bold text-white my-2">{{ $statusCounts['read'] ?? 0 }}</h2>
                                <p class="mb-0 text-white-50">Pesan telah dibaca</p>
                            </div>
                            <div class="statistic-icon bg-white text-info">
                                <i class="bx bx-envelope-open fs-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-2">
                        <a href="{{ route('admin.contact.index', ['status' => 'read']) }}"
                            class="text-white d-flex justify-content-between align-items-center">
                            <span>Lihat Sudah Dibaca</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="card filter-form mb-4">
            <div class="card-body p-4">
                <form action="{{ route('admin.contact.index') }}" method="GET" id="searchForm">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="search" class="form-label">Cari Pesan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-search"></i></span>
                                    <input type="text" class="form-control search-input" id="search" name="search"
                                        placeholder="Nama, email, subjek..." value="{{ request('search') }}">
                                    @if (request('search'))
                                        <button type="button" class="btn btn-outline-secondary" id="clearSearch">
                                            <i class="bx bx-x"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">Semua Status</option>
                                    <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum
                                        Dibaca</option>
                                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sort" class="form-label">Urutkan</label>
                                <select class="form-select" id="sort" name="sort">
                                    <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>
                                        Terbaru</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama
                                    </option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama
                                        (A-Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama
                                        (Z-A)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bx bx-filter-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contact List -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Daftar Pesan Kontak</h5>
                <div class="d-flex align-items-center">
                    <span class="badge bg-label-primary me-3">{{ $contacts->total() }} pesan</span>
                    <button type="button" class="btn btn-danger btn-sm d-none" id="bulkDeleteBtn">
                        <i class="bx bx-trash me-1"></i> Hapus Terpilih (<span id="selectedCount">0</span>)
                    </button>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-danger btn-sm d-none" id="bulkDeleteBtn">
                    <i class="bx bx-trash me-1"></i> Hapus Terpilih (<span id="selectedCount">0</span>)
                </button>
            </div>

            @if ($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th width="40">
                                    <div class="form-check">
                                        <input class="form-check-input checkbox-animated" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th width="280">Pengirim</th>
                                <th>Pesan</th>
                                <th width="120">Status</th>
                                <th width="120">Tanggal</th>
                                <th width="120">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr class="contact-row {{ $contact->status }}">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox-animated contact-checkbox"
                                                type="checkbox" value="{{ $contact->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-container me-3">
                                                <div
                                                    class="avatar bg-label-{{ $contact->status == 'unread' ? 'warning' : ($contact->status == 'read' ? 'info' : 'success') }} me-2">
                                                    <span
                                                        class="avatar-initial rounded-circle">{{ substr($contact->name, 0, 1) }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-0 text-nowrap">{{ $contact->name }}</h6>
                                                <small>
                                                    <a href="mailto:{{ $contact->email }}"
                                                        class="text-muted">{{ $contact->email }}</a>
                                                </small>
                                                <small class="text-muted">{{ $contact->phone }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">{{ $contact->subject }}</span>
                                            <small class="text-muted text-truncate d-inline-block"
                                                style="max-width: 250px;">
                                                {{ Str::limit($contact->message, 60) }}
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($contact->status == 'unread')
                                            <span class="badge bg-label-warning">
                                                <i class="bx bx-envelope me-1"></i> Belum Dibaca
                                            </span>
                                        @else
                                            <span class="badge bg-label-info">
                                                <i class="bx bx-envelope-open me-1"></i> Sudah Dibaca
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            <div><i class="bx bx-calendar me-1"></i>
                                                {{ $contact->created_at->format('d M Y') }}</div>
                                            <div><i class="bx bx-time me-1"></i> {{ $contact->created_at->format('H:i') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.contact.show', $contact->id) }}"
                                                class="btn btn-icon btn-sm btn-primary" data-bs-toggle="tooltip"
                                                title="Lihat Detail">
                                                <i class="bx bx-show"></i>
                                            </a>

                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{ $contact->id }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Hapus">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $contact->id }}"
                                                action="{{ route('admin.contact.destroy', $contact->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                        <span>Menampilkan {{ $contacts->firstItem() ?? 0 }} - {{ $contacts->lastItem() ?? 0 }} dari
                            {{ $contacts->total() }} data</span>
                    </div>
                </div>
            @else
                <div class="card-body text-center py-5">
                    <div class="py-3">
                        <i class="bx bx-envelope-open text-secondary mb-3" style="font-size: 5rem;"></i>
                        <h5 class="mb-1">Tidak Ada Pesan Ditemukan</h5>
                        <p class="text-muted mb-3">Tidak ada pesan kontak yang sesuai dengan kriteria Anda</p>
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">
                            <i class="bx bx-reset me-1"></i> Reset Filter
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Auto close alert after 5 seconds
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(function(alert) {
                    const bsAlert = bootstrap.Alert.getInstance(alert);
                    if (bsAlert) {
                        bsAlert.close();
                    }
                });
            }, 5000);

            // Handle status and sort changes
            document.getElementById('status').addEventListener('change', function() {
                document.getElementById('searchForm').submit();
            });

            document.getElementById('sort').addEventListener('change', function() {
                document.getElementById('searchForm').submit();
            });

            // Clear search button
            const clearSearchButton = document.getElementById('clearSearch');
            if (clearSearchButton) {
                clearSearchButton.addEventListener('click', function() {
                    document.getElementById('search').value = '';
                    document.getElementById('searchForm').submit();
                });
            }

            // Select all checkboxes
            const selectAllCheckbox = document.getElementById('selectAll');
            const contactCheckboxes = document.querySelectorAll('.contact-checkbox');
            const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
            const selectedCountEl = document.getElementById('selectedCount');

            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    contactCheckboxes.forEach(function(checkbox) {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                    updateBulkDeleteButton();
                });
            }

            // Handle individual checkbox changes
            contactCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateBulkDeleteButton();

                    // Update "select all" checkbox state
                    const allChecked = Array.from(contactCheckboxes).every(function(cb) {
                        return cb.checked;
                    });

                    const someChecked = Array.from(contactCheckboxes).some(function(cb) {
                        return cb.checked;
                    });

                    selectAllCheckbox.checked = allChecked;
                    selectAllCheckbox.indeterminate = someChecked && !allChecked;
                });
            });

            // Update bulk delete button visibility
            function updateBulkDeleteButton() {
                const selectedCheckboxes = document.querySelectorAll('.contact-checkbox:checked');
                const selectedCount = selectedCheckboxes.length;

                if (selectedCount > 0) {
                    bulkDeleteBtn.classList.remove('d-none');
                    selectedCountEl.textContent = selectedCount;
                } else {
                    bulkDeleteBtn.classList.add('d-none');
                }
            }

            // Bulk delete button action
            // Replace the bulk delete button click handler with this:
            if (bulkDeleteBtn) {
                bulkDeleteBtn.addEventListener('click', function() {
                    const selectedIds = Array.from(document.querySelectorAll('.contact-checkbox:checked'))
                        .map(function(checkbox) {
                            return checkbox.value;
                        });

                    if (selectedIds.length === 0) return;

                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: `Anda yakin ingin menghapus ${selectedIds.length} pesan kontak terpilih?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading
                            Swal.fire({
                                title: 'Memproses...',
                                html: 'Sedang menghapus pesan terpilih',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Send AJAX request
                            fetch('{{ route('admin.contact.bulk-destroy') }}', {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        ids: selectedIds
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: data.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            // Reload the page
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Gagal!',
                                            text: data.message,
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Terjadi kesalahan saat menghapus data',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                    console.error('Error:', error);
                                });
                        }
                    });
                });
            }

            // Mark as replied with modal
            document.querySelectorAll('.mark-replied-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const contactId = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Tandai Sebagai Dibalas',
                        input: 'textarea',
                        inputLabel: 'Catatan Admin (Wajib)',
                        inputPlaceholder: 'Masukkan catatan tentang bagaimana Anda merespons pesan ini...',
                        inputValidator: (value) => {
                            if (!value) {
                                return 'Anda harus memasukkan catatan!';
                            }
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Tandai Sudah Dibalas',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#6c757d',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading
                            Swal.fire({
                                title: 'Memproses...',
                                html: 'Mohon tunggu sebentar',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Create and submit form
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action =
                                `{{ url('admin/contact') }}/${contactId}/mark-as-replied`;
                            form.style.display = 'none';

                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = '{{ csrf_token() }}';

                            const method = document.createElement('input');
                            method.type = 'hidden';
                            method.name = '_method';
                            method.value = 'PUT';

                            const adminNotes = document.createElement('input');
                            adminNotes.type = 'hidden';
                            adminNotes.name = 'admin_notes';
                            adminNotes.value = result.value;

                            form.appendChild(csrfToken);
                            form.appendChild(method);
                            form.appendChild(adminNotes);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });

            // Delete confirmation
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const contactId = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: "Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${contactId}`).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
