<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <!-- SVG Logo -->
                        <svg width="25" viewBox="0 0 25 42" xmlns="http://www.w3.org/2000/svg">
                            <!-- ...SVG content... -->
                        </svg>
                    </span>
                    <span>
                        <a class="app-brand-text demo menu-text fw-bolder ms-2" href="{{ route('home') }}">Firstudio</a>
                    </span>
                </a>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>
            <div class="menu-inner-shadow"></div>
            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Admin</span>
                </li>
                <!-- About Management -->
                <li class="menu-item {{ request()->routeIs('admin.about.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>About</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.about.index') }}" class="menu-link">Edit About</a>
                        </li>
                    </ul>
                </li>
                <!-- Article Management -->
                <li class="menu-item {{ request()->routeIs('admin.article.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Artikel</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.article.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.article.index') }}" class="menu-link">Semua Artikel</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.article.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.article.create') }}" class="menu-link">Buat Artikel</a>
                        </li>
                    </ul>
                </li>
                <!-- Slide Management -->
                <li class="menu-item {{ request()->routeIs('admin.slide.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Slide</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.slide.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.slide.index') }}" class="menu-link">Semua Slide</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.slide.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.slide.create') }}" class="menu-link">Buat Slide</a>
                        </li>
                    </ul>
                </li>
                <!-- Client Management -->
                <li class="menu-item {{ request()->routeIs('admin.client.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Client</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.client.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.client.index') }}" class="menu-link">Semua Client</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.client.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.client.create') }}" class="menu-link">Buat Client</a>
                        </li>
                    </ul>
                </li>
                <!-- Category Management -->
                <li class="menu-item {{ request()->routeIs('admin.category.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Category</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.category.index') }}" class="menu-link">Semua Category</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.category.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.category.create') }}" class="menu-link">Buat Category</a>
                        </li>
                    </ul>
                </li>
                <!-- Tech Stack Management -->
                <li class="menu-item {{ request()->routeIs('admin.techstack.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Tech Stack</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.techstack.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.techstack.index') }}" class="menu-link">Semua Tech Stack</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.techstack.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.techstack.create') }}" class="menu-link">Buat Tech Stack</a>
                        </li>
                    </ul>
                </li>
                <!-- Service Management -->
                <li class="menu-item {{ request()->routeIs('admin.service.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Service</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.service.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.service.index') }}" class="menu-link">Semua Service</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.service.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.service.create') }}" class="menu-link">Buat Service</a>
                        </li>
                    </ul>
                </li>
                <!-- Product Management -->
                <li class="menu-item {{ request()->routeIs('admin.product.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Product</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.product.index') }}" class="menu-link">Semua Product</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.product.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.product.create') }}" class="menu-link">Buat Product</a>
                        </li>
                    </ul>
                </li>
                <!-- Portfolio Management -->
                <li class="menu-item {{ request()->routeIs('admin.portfolio.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div>Portfolio</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('admin.portfolio.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.portfolio.index') }}" class="menu-link">Semua Portfolio</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('admin.portfolio.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.portfolio.create') }}" class="menu-link">Buat Portfolio</a>
                        </li>
                    </ul>
                </li>
                <!-- Contact Management -->
                <li class="menu-item {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-envelope"></i>
                        <div>Kontak</div>
                    </a>
                </li>
                <!-- User Management -->
                <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div>Pengguna</div>
                    </a>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pengaturan</span>
                </li>
                <!-- User Settings -->
                <li class="menu-item">
                    <a href="{{ route('admin.profile') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div>Profil Saya</div>
                    </a>
                </li>
                <!-- Logout -->
                <li class="menu-item">
                    <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-log-out"></i>
                        <div>Keluar</div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('sneat-1.0.0/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('sneat-1.0.0/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li><div class="dropdown-divider"></div></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">Profil Saya</span>
                                    </a>
                                </li>
                                <li><div class="dropdown-divider"></div></li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            © <script>document.write(new Date().getFullYear());</script> Firstudio Admin Panel
                        </div>
                    </div>
                </footer>
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
