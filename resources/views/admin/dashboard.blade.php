@extends('admin.layouts.app')

@section('title', 'Dashboard | Firstudio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white shadow border-0">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-1">Selamat Datang, {{ $user->name ?? 'Admin' }}! 👋</h2>
                    <p class="mb-0 fs-5">Dashboard Admin <b>Firstudio</b></p>
                </div>
            </div>
        </div>
    </div>

    @if(isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
    @endif

    <!-- Quick Stats -->
    <div class="row mb-4 g-3">
        @php
            $statCards = [
                ['icon' => 'bx-user',      'label' => 'Pengguna',   'value' => $stats['total_users'] ?? 0,      'color' => 'primary'],
                ['icon' => 'bx-package',   'label' => 'Produk',     'value' => $stats['total_products'] ?? 0,   'color' => 'success'],
                ['icon' => 'bx-briefcase', 'label' => 'Portfolio',  'value' => $stats['total_portfolios'] ?? 0, 'color' => 'info'],
                ['icon' => 'bx-cog',       'label' => 'Layanan',    'value' => $stats['total_services'] ?? 0,   'color' => 'warning'],
                ['icon' => 'bx-news',      'label' => 'Artikel',    'value' => $stats['total_articles'] ?? 0,   'color' => 'danger'],
                ['icon' => 'bx-envelope',  'label' => 'Kontak',     'value' => $stats['total_contacts'] ?? 0,   'color' => 'dark'],
                ['icon' => 'bx-group',     'label' => 'Client',     'value' => $stats['total_clients'] ?? 0,    'color' => 'secondary'],
                ['icon' => 'bx-layer',     'label' => 'Tech Stack', 'value' => $totalTechStacks ?? 0,           'color' => 'info'],
                ['icon' => 'bx-category',  'label' => 'Kategori',   'value' => $totalCategories ?? 0,           'color' => 'secondary'],
            ];
        @endphp
        @foreach ($statCards as $stat)
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 bg-{{ $stat['color'] }} text-white me-3" style="width:48px;height:48px;display:flex;align-items:center;justify-content:center;border-radius:12px;">
                        <i class="bx {{ $stat['icon'] }} fs-2"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">{{ number_format($stat['value']) }}</h4>
                        <small class="text-muted">{{ $stat['label'] }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Visitor Chart -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="bx bx-bar-chart-alt-2 text-primary me-2"></i>Statistik Pengunjung Bulanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="visitorChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data Section -->
    <div class="row g-4">
        @php
            $recentData = [
                ['title' => 'Produk Terbaru',     'icon' => 'bx-package',   'items' => $recentProducts,   'route' => 'admin.product.index',   'field' => 'title', 'color' => 'success'],
                ['title' => 'Portfolio Terbaru',  'icon' => 'bx-briefcase', 'items' => $recentPortfolios, 'route' => 'admin.portfolio.index', 'field' => 'title', 'color' => 'info'],
                ['title' => 'Layanan Terbaru',    'icon' => 'bx-cog',       'items' => $recentServices,   'route' => 'admin.service.index',   'field' => 'title', 'color' => 'warning'],
                ['title' => 'Artikel Terbaru',    'icon' => 'bx-news',      'items' => $recentArticles,   'route' => 'admin.article.index',   'field' => 'title', 'color' => 'danger'],
                ['title' => 'Client Terbaru',     'icon' => 'bx-group',     'items' => $recentClients,    'route' => 'admin.client.index',    'field' => 'company_name', 'color' => 'secondary'],
                ['title' => 'Pesan Kontak Terbaru','icon' => 'bx-envelope', 'items' => $recentContacts,   'route' => 'admin.contact.index',   'field' => 'name',  'color' => 'dark'],
            ];
        @endphp
        @foreach ($recentData as $recent)
        <div class="col-md-6 col-lg-4">
            <div class="card dashboard-card h-100 shadow-sm border-0 card-hover">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h6 class="mb-0">
                        <i class="bx {{ $recent['icon'] }} text-{{ $recent['color'] }} me-2"></i>{{ $recent['title'] }}
                    </h6>
                    <a href="{{ route($recent['route']) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="bx bx-right-arrow-alt me-1"></i>Lihat Semua
                    </a>
                </div>
                <div class="card-body p-2">
                    <ul class="list-group list-group-flush">
                        @forelse ($recent['items'] as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    <span class="badge bg-{{ $recent['color'] }} me-2" style="width:10px;height:10px;border-radius:50%">&nbsp;</span>
                                    {{ $item[$recent['field']] ?? '-' }}
                                </span>
                                <span class="text-muted small">{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Belum ada data</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Recent User Activity -->
    <div class="row mt-4">
        <div class="col-12 mb-4">
            <div class="card dashboard-card h-100 shadow-sm border-0 card-hover">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="bx bx-history text-primary me-2"></i>Aktivitas User Terbaru</h6>
                </div>
                <div class="card-body p-2">
                    <ul class="list-group list-group-flush">
                        @forelse ($latestActivity as $activity)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="bx bx-user-circle text-primary me-2"></i>
                                    {{ $activity->name }} <span class="text-muted small">({{ $activity->email }})</span>
                                </span>
                                <span class="text-muted small">{{ \Carbon\Carbon::parse($activity->last_login_at)->diffForHumans() }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Belum ada aktivitas user</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card-hover { transition: box-shadow .2s, transform .2s; }
    .card-hover:hover { box-shadow: 0 8px 32px rgba(105,108,255,0.15)!important; transform: translateY(-3px);}
    .avatar { box-shadow: 0 2px 8px rgba(0,0,0,0.06);}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitorChart').getContext('2d');
    const visitorChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($visitors)) !!},
            datasets: [{
                label: 'Pengunjung',
                data: {!! json_encode(array_values($visitors)) !!},
                borderColor: '#696cff',
                backgroundColor: 'rgba(105,108,255,0.1)',
                tension: 0.3,
                fill: true,
                pointRadius: 4,
                pointBackgroundColor: '#696cff'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endpush
@endsection
