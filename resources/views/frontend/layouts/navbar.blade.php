<header id="header" class="header-show-hide-on-scroll menu-align-right">
    <!-- Begin header inner -->
    <div class="header-inner tt-wrap">
        
        <!-- Begin logo -->
        <div id="logo">
            <!-- logo images for big screens -->
            <a href="{{ route('home') }}" class="logo-dark"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>
            <a href="{{ route('home') }}" class="logo-light"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>

            <!-- logo images for smaller screens -->
            <a href="{{ route('home') }}" class="logo-dark-m"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>
            <a href="{{ route('home') }}" class="logo-light-m"><img src="{{ asset('logo/logo3.png') }}" alt="logo"></a>
        </div>
        <!-- End logo -->

        <!-- Begin header attributes -->
        <div class="header-attributes">
            <ul>
                <!-- Begin mobile menu toggle button (tt-main-menu) -->
                <li>
                    <div id="tt-m-menu-toggle-btn">
                        <span></span>
                    </div>
                </li>
                <!-- End mobile menu toggle button -->
            </ul>
        </div>
        <!-- End header attributes -->

        <!-- Begin main menu -->
        <nav class="tt-main-menu">
            <!-- Collect the nav links for toggling -->
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
        <!-- End main menu -->

    </div>
    <!-- End header inner -->
</header>
<!-- End header -->
