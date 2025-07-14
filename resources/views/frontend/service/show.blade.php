@extends('frontend.layouts.app')

@section('title', $service->title)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($service->description), 160))
@section('meta_keywords', $service->title . ', layanan, jasa, digital, web, aplikasi, desain, branding')

@section('content')
    <!-- ========================
    ///// Begin page header /////
    ============================= -->
    <section id="page-header" class="ph-center">
        <div class="page-header-image parallax-6 bg-image" style="background-image: url('{{ $service->image_banner ? asset($service->image_banner) : asset('aivo/assets/img/page-header/page-header-bg-6.jpg') }}');">
            <div class="cover cover-opacity-5"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-lg ph-cap-light ph-cap-shadow parallax-5 fade-out-scroll-4">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title">{{ $service->title }}</h1>
                </div>
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle">Detail Layanan</h2>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
                @if($service->short_description)
                <div class="page-header-description">
                    <div class="ph-desc-inner">
                        {{ $service->short_description }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End page header -->

    <!-- =====================================
    ///// Begin service single section /////
    ====================================== -->
    <section id="portfolio-single-section">
        <div class="portfolio-single-inner tt-wrap max-width-1100">
            <div class="row">
                <div class="col-sm-push-5 col-md-push-4 col-xs-12 col-sm-7 col-md-8">
                    <!-- Begin portfolio single text -->
                    <div class="portfolio-single-text mb-5">
                        <h3 class="mb-4 text-primary fw-bold">Tentang Layanan</h3>
                        <div class="fs-5 text-justify" style="color:#444;">
                            {!! $service->description !!}
                        </div>
                    </div>
                    <!-- End portfolio single text -->
                </div>
                <div class="col-sm-pull-7 col-md-pull-8 col-xs-12 col-sm-5 col-md-4">
                    <!-- Begin portfolio single attributes -->
                    <div class="ps-attributes mb-5">
                        <ul class="ps-attr">
                            <li>
                                <div class="ps-attr-heading">Nama Layanan:</div>
                                <div class="ps-attr-cont">{{ $service->title }}</div>
                            </li>
                            <li>
                                <div class="ps-attr-heading">Slug:</div>
                                <div class="ps-attr-cont">{{ $service->slug }}</div>
                            </li>
                            <li>
                                <div class="ps-attr-heading">Tanggal Dibuat:</div>
                                <div class="ps-attr-cont">{{ $service->created_at ? $service->created_at->format('d M Y') : '-' }}</div>
                            </li>
                        </ul>
                    </div>
                    <!-- End portfolio single attributes -->
                </div>
            </div>

            {{-- <!-- Begin portfolio single gallery -->
            @if($service->image_url)
            <div class="portfolio-single-gallery lightgallery psi-zoom psi-colored mt-5">
                <div class="isotope col-1 gutter-3">
                    <div class="isotope-items-wrap">
                        <div class="grid-sizer"></div>
                        <div class="isotope-item digital iso-height-1">
                            <figure class="portfolio-single-image-holder">
                                <a href="{{ asset($service->image_url) }}" class="ps-image-link lg-trigger" data-sub-html="{{ $service->title }}">
                                    <div class="portfolio-single-image bg-image lazy" data-src="{{ asset($service->image_url) }}" style="background-image:url('{{ asset($service->image_url) }}');height:400px;">
                                        <div class="ps-image-icon">
                                            <span class="lnr lnr-eye"></span>
                                        </div>
                                    </div>
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- End portfolio single gallery --> --}}

            
        </div>

        <!-- Back to Services -->
        <div class="margin-top-30 margin-bottom-30 text-center d-flex justify-content-center align-items-center my-5">
            <a href="{{ route('services') }}" class="service-link text-decoration-bold">
                <i class="bx bx-grid-alt me-2"></i>Lihat Semua Layanan
            </a>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="call-to-action-section cta-style-2 bg-image" style="background-image: url('{{ asset('aivo/assets/img/pattern/pt-3.png') }}');">
        <div class="cta-inner tt-wrap">
            <div class="row">
                <div class="col-md-6">
                    <div class="tt-heading tt-heading-xxlg">
                        <div class="tt-heading-inner">
                            <h1 class="tt-heading-title">Tertarik bekerja sama dengan kami?</h1>
                            <div class="tt-heading-subtitle">Kami siap membantu kamu!</div>
                            <div class="zig-zag-separator">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>Kami siap membantu kamu dengan layanan terbaik yang kami tawarkan. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                    <div class="margin-top-30">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg margin-top-5">Hubungi Kami!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .portfolio-single-inner {
        margin-top: 40px;
        margin-bottom: 40px;
    }
    .portfolio-single-text h3 {
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .ps-attributes {
        background: #f8f9fa;
        border-radius: 1rem;
        padding: 2rem 1.5rem;
        margin-bottom: 2rem;
    }
    .ps-attr {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .ps-attr li {
        margin-bottom: 1.2rem;
    }
    .ps-attr-heading {
        font-weight: 600;
        color: #6366f1;
        font-size: 1rem;
    }
    .ps-attr-cont {
        font-size: 1.08rem;
        color: #222;
    }
    .portfolio-single-gallery .portfolio-single-image {
        border-radius: 1.25rem;
        background-size: cover;
        background-position: center;
        min-height: 300px;
        margin-bottom: 1.5rem;
        position: relative;
    }
    .feature-item h6 {
        font-size: 1.08rem;
    }
    .feature-item {
        background: #f8fafc;
        border-radius: 1rem;
        padding: 1.2rem 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px #0001;
    }
    .btn-outline-primary {
        border-width: 2px;
    }
    .service-link {
        color: #6366f1;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    .service-link:hover {
        color: #4f46e5;
        transform: translateX(-5px);
    }
    .service-link i {
        font-size: 0.9em;
        transition: transform 0.3s ease;
    }
</style>
@endpush