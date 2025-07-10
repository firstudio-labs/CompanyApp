<style>
    /* Styling Logo */
    #logo {
        position: relative;
        top: 5px;
        margin-bottom: 5px;
        z-index: 9;
        height: auto;
        width: auto;
    }

    #logo img {
        max-height: 36px !important;
        height: auto !important;
        width: auto !important;
        display: block;
    }

    #logo .logo-light {
        display: none;
    }

    #logo .logo-light-m,
    #logo .logo-dark-m {
        display: none;
    }

    @media (max-width: 991px) {
        #logo {
            top: 5px !important;
        }

        #logo .logo-dark {
            display: none;
        }

        #logo .logo-dark-m {
            display: block;
        }

        #logo img {
            max-height: 50px !important;
        }
    }
</style>

<header id="header" class="header-show-hide-on-scroll menu-align-right">
    <div class="header-inner tt-wrap">
        <!-- Logo -->
        <div id="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo/logo3.png') }}" alt="logo">
            </a>
        </div>


        <!-- Mobile toggle -->
        <div class="header-attributes">
            <ul>
                <li>
                    <div id="tt-m-menu-toggle-btn">
                        <span></span>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Menu -->
        <nav class="tt-main-menu">
            <div class="tt-menu-collapse tt-submenu-dark">
                <ul class="tt-menu-nav">
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a
                            href="{{ route('about') }}">Tentang Kami</a></li>
                    <li class="{{ request()->routeIs('services*') ? 'active' : '' }}"><a
                            href="{{ route('services') }}">Layanan</a></li>
                    <li class="{{ request()->routeIs('portfolio*') ? 'active' : '' }}"><a
                            href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="{{ request()->routeIs('products*') ? 'active' : '' }}"><a
                            href="{{ route('products') }}">Produk</a></li>
                    <li class="{{ request()->routeIs('article*') ? 'active' : '' }}"><a
                            href="{{ route('article') }}">Artikel</a></li>
                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a
                            href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    let lastScrollTop = 0;
    const header = document.getElementById('header');

    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Tambah shadow jika scroll > 50
        if (scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Sembunyikan saat scroll ke bawah
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            header.classList.add('fly-up');
        } else {
            header.classList.remove('fly-up');
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
</script>
