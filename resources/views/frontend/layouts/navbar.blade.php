<style>
/* Header and Navigation */
.header {
    background-color: white;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    z-index: 997;
    position: fixed;
    top: 10px;
    left: 10%;
    right: 10%;
    width: auto;
    border-radius: 50px;
    opacity: 1;
    visibility: visible;
}

.header.scrolled {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    transform: translateY(0);
    transition: all 0.6s ease;
}

.navbar-brand {
    display: flex;
    align-items: center;
    font-weight: 700;
    font-size: 1.5rem;
    color: #333;
    margin-right: 2rem;
}

.navbar-brand i {
    font-size: 1.75rem;
    color: var(--primary-color);
}

.sitename {
    font-family: 'Montserrat', sans-serif;
    color: var(--primary-color);
}

/* Desktop Navigation */
.navbar-nav {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.nav-link {
    font-weight: 500;
    color: #495057;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    white-space: nowrap;
}

.nav-link:hover,
.nav-link.active {
    color: #0d6efd;
    background-color: rgba(13, 110, 253, 0.05);
}

.dropdown-menu {
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
    padding: 0.5rem 0;
    min-width: 200px;
}

.dropdown-item {
    padding: 0.5rem 1.5rem;
    font-weight: 500;
    display: flex;
    align-items: center;
}

.dropdown-item:hover,
.dropdown-item:focus {
    background-color: rgba(13, 110, 253, 0.05);
    color: #0d6efd;
}

.dropdown-item i {
    margin-right: 0.5rem;
    font-size: 0.9rem;
}

/* Google Translate Styles */
#google_translate_element {
    margin-left: 1rem;
}

.goog-te-combo {
    border: 1px solid var(--grey-200) !important;
    border-radius: 0.375rem !important;
    padding: 0.375rem 1.75rem 0.375rem 0.75rem !important;
    font-size: 0.875rem !important;
    font-family: 'Poppins', sans-serif !important;
    background-color: var(--white-color) !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    min-width: 120px;
}

/* Login Button */
.btn-getstarted {
    margin-left: 1rem;
    white-space: nowrap;
}

/* Mobile Navigation */
.navbar-toggler {
    border: none;
    padding: 0.5rem;
    font-size: 1.25rem;
    margin-left: auto;
}

.navbar-toggler:focus {
    box-shadow: none;
    outline: none;
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    width: 1.25em;
    height: 1.25em;
}

@media (max-width: 991.98px) {
    body {
        padding-top: 60px;
    }

    .navbar-collapse {
        position: fixed;
        top: 60px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        max-height: calc(100vh - 60px);
        overflow-y: auto;
        z-index: 996;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
    }

    .navbar-collapse.show {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
        width: 100%;
    }

    .nav-link {
        padding: 0.75rem 1rem;
        width: 100%;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: var(--primary-very-light);
        transform: translateX(5px);
    }

    .dropdown-menu {
        position: static !important;
        transform: none !important;
        width: 100%;
        margin: 0.5rem 0;
        box-shadow: none;
        border: 1px solid var(--grey-200);
        background-color: var(--grey-100);
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .dropdown-menu.show {
        opacity: 1;
        max-height: 500px;
        margin: 0.5rem 0;
    }

    .dropdown-item {
        padding: 0.75rem 1.25rem;
        border-radius: 6px;
        margin: 0.25rem 0;
    }

    .dropdown-item:hover {
        background-color: var(--primary-very-light);
        transform: translateX(5px);
    }

    #google_translate_element {
        margin: 1rem 0;
        width: 100%;
    }

    .goog-te-combo {
        width: 100% !important;
        max-width: 100%;
        padding: 0.5rem !important;
        border-radius: 8px !important;
    }

    .btn-getstarted {
        margin: 1rem 0 0 0;
        width: 100%;
        text-align: center;
        padding: 0.75rem !important;
        border-radius: 8px !important;
    }

    /* Tambahan untuk animasi dropdown */
    .nav-item.dropdown .nav-link::after {
        transition: transform 0.3s ease;
    }

    .nav-item.dropdown.show .nav-link::after {
        transform: rotate(180deg);
    }
}
</style>
<header id="header" class="header-show-hide-on-scroll menu-align-right">
    <div class="header-inner tt-wrap">
        <div id="logo">
            <a href="{{ route('home') }}" class="logo-dark"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>
            <a href="{{ route('home') }}" class="logo-light"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>
            <a href="{{ route('home') }}" class="logo-dark-m"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>
            <a href="{{ route('home') }}" class="logo-light-m"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>
        </div>

        <nav class="tt-main-menu">
            <div class="tt-menu-collapse tt-submenu-dark">
                <ul class="tt-menu-nav">
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                    <li class="{{ request()->routeIs('services*') ? 'active' : '' }}"><a href="{{ route('services') }}">Services</a></li>
                    <li class="{{ request()->routeIs('portfolio*') ? 'active' : '' }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="{{ request()->routeIs('products*') ? 'active' : '' }}"><a href="{{ route('products') }}">Product</a></li>
                    <li class="{{ request()->routeIs('article*') ? 'active' : '' }}"><a href="{{ route('article') }}">Article</a></li>
                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
