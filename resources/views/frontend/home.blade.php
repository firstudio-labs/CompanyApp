@extends('frontend.layouts.app')

@section('title', 'Firstudio - Creative Digital Solutions')
@section('meta_description', 'Firstudio provides creative digital solutions for your business.')
@section('meta_keywords', 'firstudio, digital, creative, agency, portfolio, service')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/ytplayer/css/jquery.mb.YTPlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/lightgallery/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
@endpush

@section('content')
    <div id="body-content">

        {{-- Intro Section --}}
        <section id="tt-intro" class="intro-full-m">
            <div class="tt-intro-inner">
                <div class="owl-carousel cursor-grab bg-dark cc-hover-zoom" data-items="1" data-loop="true"
                    data-dots="false" data-nav="true" data-autoplay="true" data-autoplay-timeout="8000"
                    data-autoplay-hover-pause="true" data-animate-in="fadeIn" data-animate-out="fadeOut">
                    @foreach ($slides as $slide)
                        <div class="cc-item">
                            <div class="intro-image-wrap parallax-6">
                                <div class="intro-image bg-dark bg-image"
                                    style="background-image: url('{{ $slide->image_url }}');">
                                    <div class="cover cover-opacity-5"></div>
                                </div>
                            </div>
                            <div
                                class="intro-caption-wrap caption-animate intro-caption-xxlg center parallax-4 fade-out-scroll-5">
                                <div class="intro-caption-holder">
                                    <div class="intro-caption center">
                                        <h1 class="intro-title">{{ $slide->title }}</h1>
                                        <h2 class="intro-subtitle">{{ $slide->subtitle }}</h2>
                                        <div class="intro-description">{!! $slide->description !!}</div>
                                        @if ($slide->button_link)
                                            <div class="intro-buttons">
                                                <a href="{{ $slide->button_link }}"
                                                    class="btn btn-primary margin-top-5 margin-right-10" target="_blank">
                                                    {{ $slide->button_text ?? 'Learn More' }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- =============================
             >>>>> Begin about us section <<<<<
             ============================== -->
        <section id="about-us-section">
            <div class="about-us-inner tt-wrap">
                {{-- Menggunakan data-aos untuk animasi fade-up saat section muncul --}}
                <div class="split-box" data-aos="fade-up" data-aos-duration="800">
                    <div class="container-fluid">
                        <div class="row row-lg-height">

                            <!-- Split box image -->
                            <div class="col-lg-6 col-lg-height split-box-image-wrapper no-padding">
                                <div class="split-box-image no-padding bg-image sbi-shadow"
                                    style="background-image: url('{{ isset($about) && $about && $about->image_url ? asset($about->image_url) : asset('aivo/assets/img/misc/us-2.jpg') }}');">
                                    {{-- Kosongkan div ini, fungsinya hanya untuk memberi tinggi --}}
                                    <div class="sbi-height padding-height-80"></div>
                                </div>
                            </div>

                            <!-- Split box content -->
                            <div class="col-lg-6 col-lg-height col-lg-middle no-padding">
                                <div class="split-box-content sb-content-right">
                                    <div class="tt-heading tt-heading-xxlg">
                                        <div class="tt-heading-inner">
                                            <h2 class="tt-heading-title">{{ $about->title ?? 'Tentang Kami' }}</h2>
                                            <div class="tt-heading-subtitle">
                                                {{ $about->subtitle ?? 'Perjalanan dan Visi Kami' }}</div>
                                            <div class="zig-zag-separator">
                                                <span></span><span></span><span></span><span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="split-box-content-text">
                                        {!! isset($about) && $about->description
                                            ? $about->description
                                            : '<p class="text-muted">Deskripsi tentang kami belum tersedia. Kami adalah agensi digital yang bersemangat dalam menciptakan solusi inovatif.</p>' !!}
                                    </div>

                                    {{-- Bagian Achievements yang telah di-refactor --}}
                                    @if (isset($about) && $about && $about->achievements)
                                        <div class="achievements-grid mt-4">
                                            @foreach (json_decode($about->achievements) as $achievement)
                                                <div class="achievement-card">
                                                    <div class="achievement-icon">
                                                        <i class="bx bx-check-circle"></i>
                                                    </div>
                                                    <div class="achievement-text">
                                                        <h5 class="mb-0">{{ $achievement->title }}</h5>
                                                        <small>{{ $achievement->description }}</small>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about us section -->


        <!-- =============================
            ///// Begin services section /////
            ============================== -->
        <section id="services-section" class="services-style-1 bg-gray-3 bg-pattern"
            style="background-image: url('{{ asset('aivo/assets/img/pattern/transparent/pt-transparent-2.png') }}');">
            <div class="cover cover-opacity-1 cover-light"></div>
            <div class="services-inner tt-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tt-heading tt-heading-xxlg text-center">
                            <div class="tt-heading-inner">
                                <h2 class="tt-heading-title">Visi &amp; Misi</h2>
                                <div class="tt-heading-subtitle">Tujuan &amp; Langkah Kami</div>
                                <div class="zig-zag-separator">
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box-wrap ib-style-2 ib-icon-bg-shape">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="info-box text-center h-100">
                                <span class="info-box-icon"><span class="lnr lnr-bullhorn text-success"></span></span>
                                <div class="info-box-info">
                                    <h3 class="info-box-heading text-success">Visi</h3>
                                    <div class="info-box-text fs-5">
                                        {{ $about->vision ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-box h-100">
                                <span class="info-box-icon"><span class="lnr lnr-list text-info"></span></span>
                                <div class="info-box-info">
                                    <h3 class="info-box-heading text-info">Misi</h3>
                                    <div class="info-box-text fs-5">
                                        @if (!empty($about->mission))
                                            <ul class="list-unstyled text-start d-inline-block mx-auto"
                                                style="max-width: 400px;">
                                                @foreach (preg_split('/\r\n|\r|\n/', $about->mission) as $point)
                                                    @if (trim($point) !== '')
                                                        <li class="mb-2"><i
                                                                class="bx bx-check-circle text-primary me-2"></i>{{ $point }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End services/visi misi section -->

        {{-- Services Section --}}
        <section id="services-section" class="services-style-1">
            <div class="services-inner tt-wrap">
                <div class="tt-heading tt-heading-lg text-center padding-on">
                    <div class="tt-heading-inner">
                        <h1 class="tt-heading-title">Layanan Kami</h1>
                        <div class="tt-heading-subtitle">Layanan yang kami tawarkan</div>
                        <div class="zig-zag-separator">
                            <span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                </div>
                <div class="info-box-wrap ib-style-2 ib-icon-bg-shape">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-sm-4 mb-4">
                                <div class="info-box">
                                    <span class="info-box-icon"><span
                                            class="{{ $service->icon ?? 'lnr lnr-cog' }}"></span></span>
                                    <div class="info-box-info">
                                        <h3 class="info-box-heading"><a
                                                href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
                                        </h3>
                                        <div class="info-box-text tt-ellipsis">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($service->description), 100) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Video Promo Section --}}
        <section class="video-promo-section bg-image"
            style="background-image: url('{{ asset('assets/img/misc/misc-5.jpg') }}');">
            <div class="cover cover-opacity-5"></div>
            <div class="video-promo-inner tt-wrap">
                <div class="video-promo-caption">
                    <div class="tt-heading tt-heading-xlg text-center text-white">
                        <div class="tt-heading-inner tt-wrap">
                            <h1 class="tt-heading-title">Video Promo</h1>
                            <div class="tt-heading-subtitle">Watch our video presentation</div>
                        </div>
                    </div>
                    <div class="video-promo-btn-wrap vpb-animated lightgallery">
                        <a href="{{ $about->video_url ?? 'https://vimeo.com/9176726' }}"
                            class="video-promo-btn lg-trigger">
                            <span class="lnr lnr-camera-video"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Portfolio Grid Section --}}
        <section id="portfolio-list-section">
            <div class="portfolio-list-inner isotope-wrap tt-wrap">
                <div class="tt-heading tt-heading-lg text-center padding-on">
                    <div class="tt-heading-inner">
                        <h1 class="tt-heading-title">Latest Projects</h1>
                        <div class="tt-heading-subtitle">Please see our recent work</div>
                        <div class="zig-zag-separator">
                            <span></span><span></span><span></span><span></span>
                        </div>
                       
                    </div>
                </div>

                <div class="isotope col-3 gutter-3">
                    
                    <div class="isotope-items-wrap pli-white pli-alter-4">
                        <div class="grid-sizer"></div>
                        @forelse($portfolios as $portfolio)
                            <div class="isotope-item {{ Str::slug($portfolio->service->title ?? 'all') }} iso-height-1">
                                <div class="portfolio-list-item">
                                    <div class="pl-item-image-wrap">
                                        <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="pl-item-image-inner">
                                            <div class="pl-item-image bg-image lazy"
                                                data-src="{{ $portfolio->image_url ? asset($portfolio->image_url) : asset('aivo/assets/img/portfolio/list/list-1/portfolio-list-1.jpg') }}">
                                            </div>
                                            <div class="pl-item-icon"><span class="lnr lnr-link"></span></div>
                                        </a>
                                    </div>
                                    <div class="pl-item-info">
                                        <div class="pl-item-caption">
                                            <h2 class="pl-item-title">
                                                <a href="{{ route('portfolio.show', $portfolio->slug) }}">{{ $portfolio->title }}</a>
                                            </h2>
                                            <div class="pl-item-category">
                                                @if ($portfolio->service)
                                                    <a href="{{ route('services.show', $portfolio->service->slug) }}">{{ $portfolio->service->title }}</a>
                                                @endif
                                            </div>
                                            <div class="portfolio-techstack mt-2">
                                                @if ($portfolio->techStacks && $portfolio->techStacks->count())
                                                    @foreach ($portfolio->techStacks as $stack)
                                                        <span class="badge">
                                                            @if ($stack->icon)
                                                                <img src="{{ asset('storage/' . $stack->icon) }}"
                                                                    alt="{{ $stack->name }}">
                                                            @endif
                                                            {{ $stack->name }}
                                                        </span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="pl-item-desc mt-2" style="color:#6c7a89;">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($portfolio->description), 90) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center py-5">
                                    Belum ada portfolio yang tersedia saat ini.
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!-- End isotope items wrap -->
                </div>
            </div>
        </section>

        {{-- Products Section --}}
        <section id="products-section">
            <div class="products-inner tt-wrap">
                <div class="tt-heading tt-heading-lg text-center padding-on">
                    <div class="tt-heading-inner">
                        <h1 class="tt-heading-title">Latest Products</h1>
                        <div class="tt-heading-subtitle">Our newest products</div>
                        <div class="zig-zag-separator">
                            <span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                </div>

                <div class="portfolio-list-inner isotope-wrap">
                    <div class="isotope col-3 gutter-3">
                       

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
                                                                    <img src="{{ asset('storage/' . $stack->icon) }}"
                                                                        alt="{{ $stack->name }}">
                                                                @endif
                                                                {{ $stack->name }}
                                                            </span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="pl-item-desc mt-2" style="color:#6c7a89;">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 90) }}
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
                    </div>
                </div>
            </div>
        </section>

        {{-- Blog/News Section --}}
        <section id="latest-news-section">
            <div class="latest-news-section-inner tt-wrap">
                <div class="tt-heading tt-heading-xlg text-center margin-bottom-80">
                    <div class="tt-heading-inner">
                        <h1 class="tt-heading-title">Latest News</h1>
                        <div class="tt-heading-subtitle">Recent articles from blog</div>
                        <div class="zig-zag-separator">
                            <span></span><span></span><span></span><span></span>
                        </div>
                        <div class="tt-heading-text">
                            <p>Duis mattis quam quis quam cursus, a rutrum ante luctus. Phasellus porta ornare enim ac
                                euismod. Nulla fringilla lectus ac tincidunt viverra.</p>
                        </div>
                    </div>
                </div>
                <div class="latest-news-carousel">
                    <div class="owl-carousel cursor-grab nav-outside-top nav-rounded" data-lazy-load="true"
                        data-items="3" data-margin="30" data-loop="true" data-dots="false" data-nav="true"
                        data-nav-speed="500" data-autoplay="false" data-autoplay-timeout="5000"
                        data-autoplay-speed="500" data-autoplay-hover-pause="true" data-tablet-landscape="3"
                        data-tablet-portrait="2" data-mobile-landscape="1" data-mobile-portrait="1">
                        @foreach ($articles as $article)
                            <div class="cc-item">
                                <article class="blog-list-item">
                                    <div class="bl-item-image-wrap">
                                        <a href="{{ route('article.show', $article->slug) }}"
                                            class="bl-item-image bg-image owl-lazy"
                                            data-src="{{ asset($article->image_url) }}"></a>
                                    </div>
                                    <div class="bl-item-info">
                                        <div class="bl-item-category">
                                            @if ($article->service)
                                                <a
                                                    href="{{ route('services.show', $article->service->slug) }}">{{ $article->service->title }}</a>
                                            @endif
                                        </div>
                                        <a href="{{ route('article.show', $article->slug) }}" class="bl-item-title">
                                            <h2>{{ $article->title }}</h2>
                                        </a>
                                        <div class="bl-item-meta">
                                            <span
                                                class="published">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('l, d F Y') }}
                                            </span>
                                            <span class="posted-by">- by <a
                                                    href="#">{{ $article->author ?? 'Admin' }}</a></span>
                                        </div>
                                        <div class="bl-item-desc">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- =============================================
            ///// Begin call to action section (style-2) /////
            ============================================== -->
        <section class="call-to-action-section cta-style-2 bg-dark text-white bg-image"
            style="background-image: url({{ asset('assets/img/pattern/pt-2.jpg') }});">

            <!-- Element cover
                ===================
                * Use class "cover-opacity-*" to set cover opasity (1, 1.5, 2, 2.5, ... 9.5). Example: "cover-opacity-2" or "cover-opacity-2-5".
                * Aditional color classes you can use: "cover-color", "cover-light", "cover-red", "cover-pink", "cover-purple", "cover-green", "cover-blue", "cover-yellow" or "cover-brown" to set cover background color (note: class "cover-color" = template main color).
                * Use class "cover-gradient-dark", "cover-gradient-light" or "cover-gradient-color" to enable cover gradient background.
                -->
            <div class="cover cover-gradient-dark cover-opacity-9"></div>

            <div class="cta-inner tt-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tt-heading tt-heading-xxlg">
                            <div class="tt-heading-inner">
                                <h1 class="tt-heading-title">Do You Feel Excited?</h1>
                                <div class="tt-heading-subtitle">Interested in working with us?</div>
                                <div class="zig-zag-separator zig-zag-light">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Fusce et velit sed augue rhoncus tempor. Sed ac lacinia augue, nec lacinia felis. Sed sit amet
                            diam leo. Praesent vel malesuada arcu. Donec mattis, arcu vel vehicula feugiat sem turpis.</p>
                        <div class="margin-top-30">
                            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg margin-top-5">Let's Work
                                Together!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End call to action section (style-2) -->

        {{-- Clients Section --}}
        <section id="clients-section" class="clients-style-1">
            <div class="clients-inner tt-wrap">
                <div class="row">
                    <div class="col-lg-push-7 col-lg-5">
                        <div class="tt-heading tt-heading-xlg">
                            <div class="tt-heading-inner">
                                <h1 class="tt-heading-title">Clients</h1>
                                <div class="tt-heading-subtitle">Our Loyal Clients</div>
                                <div class="zig-zag-separator">
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <div class="tt-heading-text">
                                    {{ $about->client_text ?? 'We are trusted by these companies.' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-pull-5 col-lg-7">
                        <ul class="client-list">
                            @foreach ($clients as $client)
                                <li>
                                    <a href="#" title="{{ $client->company_name }}">
                                        <img src="{{ asset('images/clients/' . $client->company_logo) }}"
                                            alt="{{ $client->company_name }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- Fun Facts Section --}}
        <section id="funn-facts-section" class="bg-main ff-light bg-pattern"
            style="background-image: url('{{ asset('assets/img/pattern/transparent/pt-transparent-6.png') }}');">
            <div class="funn-facts-inner tt-wrap">
                <div class="cover cover-opacity-4 cover-color"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-users"></i></div>
                            <div class="counter-up">{{ $about->customers_count ?? 0 }}</div>
                            <h4 class="counter-up-title">Satisfied Customers</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-leaf"></i></div>
                            <div class="counter-up">{{ $about->projects_count ?? 0 }}</div>
                            <h4 class="counter-up-title">Completed Projects</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-trophy"></i></div>
                            <div class="counter-up">{{ $about->awards_count ?? 0 }}</div>
                            <h4 class="counter-up-title">Winning Awards</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-life-ring"></i></div>
                            <div class="counter-up">{{ $about->support_count ?? 0 }}</div>
                            <h4 class="counter-up-title">Support Provided</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/ytplayer/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.dotdotdot.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-lazy/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-lazy/js/jquery.lazy.plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Products Isotope init
            var $isoProducts = $('#products-section .isotope-items-wrap').imagesLoaded(function() {
                $isoProducts.isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
            });

            // Products Filter
            $('#products-section .isotope-filter-links button').on('click', function() {
                $('#products-section .isotope-filter-links button').removeClass('active');
                $(this).addClass('active');
                var filterValue = $(this).attr('data-filter');
                $isoProducts.isotope({
                    filter: filterValue
                });
            });

            // Lazy load bg images for products
            $('#products-section .lazy').each(function() {
                var $el = $(this);
                $el.css('background-image', 'url(' + $el.data('src') + ')');
            });

            // Portfolio Isotope init
            var $isoPortfolio = $('#portfolio-list-section .isotope-items-wrap').imagesLoaded(function() {
                $isoPortfolio.isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
            });

            // Portfolio Filter
            $('#portfolio-list-section .isotope-filter-links button').on('click', function() {
                $('#portfolio-list-section .isotope-filter-links button').removeClass('active');
                $(this).addClass('active');
                var filterValue = $(this).attr('data-filter');
                $isoPortfolio.isotope({
                    filter: filterValue
                });
            });

            // Lazy load bg images for portfolio
            $('#portfolio-list-section .lazy').each(function() {
                var $el = $(this);
                $el.css('background-image', 'url(' + $el.data('src') + ')');
            });
        });
    </script>
@endpush

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
