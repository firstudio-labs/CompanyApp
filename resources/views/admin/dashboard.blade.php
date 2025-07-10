@extends('admin.layouts.app')

@section('title', 'Dashboard | Firstudio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y" style="background: linear-gradient(120deg, #f3f6fd 0%, #e9f0fb 100%); min-height: 100vh;">
    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white shadow border-0 position-relative overflow-hidden" style="border-radius: 1.2rem;">
                <div class="card-body p-4 d-flex align-items-center" style="min-height: 140px;">
                    <div class="flex-grow-1">
                        <h2 class="fw-bold mb-1 text-white">Selamat Datang, {{ $user->name ?? 'Admin' }}! 👋</h2>
                        <p class="mb-0 fs-5">Dashboard Admin <b>Firstudio</b></p>
                    </div>
                </div>
                <div style="position:absolute;right:-60px;bottom:-40px;opacity:0.15;">
                    <i class="bx bx-code-alt" style="font-size:160px;"></i>
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
            <div class="card shadow-sm border-0 h-100 card-hover stat-animate" style="transition:transform .2s,box-shadow .2s;">
                <div class="card-body d-flex align-items-center py-3">
                    <div class="avatar flex-shrink-0 bg-{{ $stat['color'] }} text-white me-3 d-flex align-items-center justify-content-center" style="width:52px;height:52px;border-radius:14px;font-size:2rem;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                        <i class="bx {{ $stat['icon'] }}"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold count-up" data-count="{{ $stat['value'] }}">0</h4>
                        <small class="text-muted">{{ $stat['label'] }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- <!-- Visitor Chart -->
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
    </div> --}}

    <!-- Recent Data Section -->
    <div class="row mb-2">
        <div class="col-12">
            <h4 class="fw-bold mb-3" style="letter-spacing:0.01em;">Data Terbaru</h4>
            <p class="text-muted mb-4" style="font-size:1.08rem;">Berikut adalah ringkasan data terbaru yang masuk ke sistem Firstudio.</p>
        </div>
    </div>
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
            <div class="card dashboard-card h-100 shadow-sm border-0 card-hover recent-animate" style="transition:box-shadow .2s,transform .2s; border-radius: 1.1rem;">
                <div class="card-header d-flex justify-content-between align-items-center border-0" style="border-top-left-radius:1.1rem;border-top-right-radius:1.1rem;background:linear-gradient(90deg, rgba(var(--bs-{{ $recent['color'] }}-rgb),0.18) 0%, #fff 100%);padding:1rem 1.2rem;">
                    <div class="d-flex align-items-center">
                        <span class="rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="background:rgba(var(--bs-{{ $recent['color'] }}-rgb),0.22);width:34px;height:34px;"><i class="bx {{ $recent['icon'] }} fs-5 text-{{ $recent['color'] }}"></i></span>
                        <span class="fw-bold text-dark" style="font-size:1.08rem;">{{ $recent['title'] }}</span>
                    </div>
                    <a href="{{ route($recent['route']) }}" class="btn btn-sm btn-outline-{{ $recent['color'] }} rounded-pill fw-semibold" style="white-space:nowrap;">
                        <i class="bx bx-right-arrow-alt me-1"></i>Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($recent['items'] as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-3 border-0 border-bottom" style="background:rgba(0,0,0,0.01);">
                                <span class="d-flex align-items-center">
                                    <span class="badge bg-{{ $recent['color'] }} bg-opacity-75 me-2" style="width:10px;height:10px;border-radius:50%">&nbsp;</span>
                                    <span class="fw-semibold">{{ $item[$recent['field']] ?? '-' }}</span>
                                </span>
                                <span class="text-muted small"><i class="bx bx-calendar me-1"></i>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted py-4 border-0">Belum ada data</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- <!-- Recent User Activity -->
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
    </div> --}}
</div>

@push('styles')
<style>
    body { background: #f3f6fd; }
    .card-hover { transition: box-shadow .2s, transform .2s; }
    .card-hover:hover { box-shadow: 0 8px 32px rgba(105,108,255,0.15)!important; transform: translateY(-3px) scale(1.03);}
    .avatar { box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
    .stat-animate { animation: fadeInUp .7s; }
    .recent-animate { animation: fadeIn .9s; }
    @keyframes fadeInUp { from { opacity:0; transform:translateY(30px);} to { opacity:1; transform:none; } }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    .dashboard-card .card-header {
        font-size: 1.08rem;
        letter-spacing: 0.01em;
        border-bottom: 1px solid #e9ecef;
        background: none;
        color: #222;
    }
    .dashboard-card .list-group-item {
        transition: background .15s;
    }
    .dashboard-card .list-group-item:hover {
        background: #f3f6fd;
    }
    .dashboard-card .badge {
        min-width: 10px;
        min-height: 10px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Animasi count up untuk angka statistik
    document.querySelectorAll('.count-up').forEach(function(el) {
        const target = +el.getAttribute('data-count');
        let count = 0;
        const step = Math.ceil(target / 40);
        function update() {
            count += step;
            if(count > target) count = target;
            el.textContent = count.toLocaleString();
            if(count < target) requestAnimationFrame(update);
        }
        update();
    });
</script>
@endpush
@endsection
