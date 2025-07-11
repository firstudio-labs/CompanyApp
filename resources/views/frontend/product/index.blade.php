{{-- filepath: resources/views/frontend/product/index.blade.php --}}
@extends('frontend.layouts.app')

@section('title', 'Produk Kami')
@section('meta_description', 'Daftar produk unggulan dari layanan kami')
@section('meta_keywords', 'produk, layanan, firstudio, haji, qurban')

@section('styles')
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/ytplayer/css/jquery.mb.YTPlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/lightgallery/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('aivo/assets/css/theme.css') }}">
    <style>
        .portfolio-techstack .badge {
            background: #f8f9fa;
            color: #2d3a4b;
            border: 1px solid #e5eaf2;
            font-size: 0.95em;
            margin-right: 2px;
            margin-bottom: 2px;
            padding: 0.25em 0.6em;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
        }
        .portfolio-techstack img {
            width: 18px;
            height: 18px;
            object-fit: contain;
            margin-right: 3px;
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <!-- Begin page header -->
    <section id="page-header" class="ph-lg">
        <div class="page-header-image parallax-6 bg-image"
            style="background-image: url('{{ asset('aivo/assets/img/pattern/pt-1.png') }}');">
            <div class="cover cover-opacity-4"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-xlg ph-cap-light ph-cap-shadow parallax-5 fade-out-scroll-4">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title">Produk Kami</h1>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
                <div class="page-header-description">
                    <div class="ph-desc-inner">
                        Temukan produk terbaik dari layanan kami untuk kebutuhan Anda.
                    </div>
                </div>
            </div>
        </div>
        <div class="ph-anim-element-wrap hide-ph-anim parallax-4 fade-out-scroll-4">
            <div class="ph-anim-element-holder">
                <div class="ph-anim-element"></div>
            </div>
        </div>
    </section>
    <!-- End page header -->

    <!-- Begin product list section -->
    <section id="portfolio-list-section">
        <div class="portfolio-list-inner isotope-wrap tt-wrap">
            <div class="isotope col-3 gutter-3">
                <!-- Begin isotope top content -->
                <div class="isotope-top-content">
                    <!-- Begin isotope filter -->
                    <div class="isotope-filter">
                        <div class="isotope-filter-button">
                            <span class="ifb-icon"><span class="lnr lnr-funnel"></span></span>
                            <span class="ifb-icon-close"><i class="fas fa-times"></i></span>
                            <span class="ifb-text">Filter</span>
                        </div>
                        <ul class="isotope-filter-links">
                            <li class="ifl-title"><span>Filter: </span></li>
                            <li><button class="active" data-filter="*">Semua</button></li>
                            @foreach ($services as $service)
                                <li>
                                    <button data-filter=".{{ \Illuminate\Support\Str::slug($service->title) }}">{{ $service->title }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End isotope filter -->
                </div>
                <!-- End isotope top content -->

                <!-- Begin isotope items wrap -->
                <div class="isotope-items-wrap pli-white pli-alter-4">
                    <div class="grid-sizer"></div>
                    @forelse($products as $product)
                        <div class="isotope-item {{ \Illuminate\Support\Str::slug($product->service->title ?? 'all') }} iso-height-1">
                            <div class="portfolio-list-item">
                                <div class="pl-item-image-wrap">
                                    <a href="{{ route('products.show', $product->slug) }}" class="pl-item-image-inner">
                                        <div class="pl-item-image bg-image lazy"
                                            data-src="{{ $product->image_url ? asset('images/products/' . $product->image_url) : asset('aivo/assets/img/portfolio/list/list-1/portfolio-list-1.jpg') }}">
                                        </div>
                                        <div class="pl-item-icon"><span class="lnr lnr-link"></span></div>
                                    </a>
                                </div>
                                <div class="pl-item-info">
                                    <div class="pl-item-caption">
                                        <h2 class="pl-item-title">
                                            <a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
                                        </h2>
                                        <div class="pl-item-category">
                                            <a href="#">{{ $product->service->title ?? '-' }}</a>
                                        </div>
                                        <div class="portfolio-techstack mt-2">
                                            @if ($product->techStacks && $product->techStacks->count())
                                                @foreach ($product->techStacks as $stack)
                                                    <span class="badge">
                                                        @if ($stack->icon)
                                                            <img src="{{ asset('storage/' . $stack->icon) }}" alt="{{ $stack->name }}">
                                                        @endif
                                                        {{ $stack->name }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center py-5">
                                Belum ada produk yang tersedia saat ini.
                            </div>
                        </div>
                    @endforelse
                </div>
                <!-- End isotope items wrap -->

                <!-- Pagination -->
                <div class="tt-pagination-wrap tt-pagin-center tt-pagin-rounded">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- End product list section -->
@endsection

@section('scripts')
    <script src="{{ asset('aivo/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Isotope init
            var $iso = $('.isotope-items-wrap').imagesLoaded(function() {
                $iso.isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
            });
            // Filter
            $('.isotope-filter-links button').on('click', function() {
                $('.isotope-filter-links button').removeClass('active');
                $(this).addClass('active');
                var filterValue = $(this).attr('data-filter');
                $iso.isotope({
                    filter: filterValue
                });
            });
            // Lazy load bg images
            $('.lazy').each(function() {
                var $el = $(this);
                $el.css('background-image', 'url(' + $el.data('src') + ')');
            });
        });
    </script>
@endsection

