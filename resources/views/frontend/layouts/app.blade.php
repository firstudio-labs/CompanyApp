<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Aivo - Multipurpose Portfolio HTML Website Template')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('meta_description', 'Responsive multipurpose portfolio HTML website template')">
    <meta name="keywords" content="@yield('meta_keywords', 'HTML5, CSS3, Bootstrap, Responsive, Multipurpose, Portfolio, Template, Theme, Website, Themetorium')">
    <meta name="author" content="themetorium.net">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('aivo/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('aivo/favicon.ico') }}" type="image/x-icon">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">

    <!-- Bootstrap 3 CSS -->
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Libs and Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/ytplayer/css/jquery.mb.YTPlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/lightgallery/css/lightgallery.min.css') }}">

    <!-- Theme master CSS -->
    <link rel="stylesheet" href="{{ asset('aivo/assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/css/theme.css') }}">

    @yield('styles')
</head>
<body id="body" class="animsition tt-boxed">
    {{-- Navbar --}}
    @include('frontend.layouts.navbar')

    {{-- Main Content --}}
    <div id="body-content">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('frontend.layouts.footer')

    <!-- Core JS -->
    <script src="{{ asset('aivo/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Libs and Plugins JS -->
    <script src="{{ asset('aivo/assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/ytplayer/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.dotdotdot.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery-lazy/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery-lazy/js/jquery.lazy.plugins.min.js') }}"></script>

    <!-- Theme master JS -->
    <script src="{{ asset('aivo/assets/js/theme.js') }}"></script>
    @yield('scripts')
</body>
</html>