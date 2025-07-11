@extends('frontend.layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Tentang Kami | Firstudio')
@section('meta_description', isset($about) && $about && $about->description ? Str::limit(strip_tags($about->description), 160) : 'Profil, visi, dan layanan kami')
@section('meta_keywords', 'about, tentang kami, profil, visi, misi, layanan')

@section('content')
    <!-- ========================
    ///// Begin page header /////
    ============================= -->
    <section id="page-header" class="ph-left">
        <div class="page-header-image parallax-6 bg-image" style="background-image: url('{{ asset('aivo/assets/img/pattern/pt-1.png') }}');">
            <div class="cover cover-opacity-4"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-xlg ph-cap-light ph-cap-shadow parallax-5 fade-out-scroll-4 text-start">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title text-start">Tentang Kami</h1>
                </div>
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle text-start">Perjalanan dan Visi Kami</h2>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
                <div class="page-header-description">
                    <div class="ph-desc-inner text-start">
                        Temukan informasi lebih lanjut tentang kami dan perjalanan kami menuju kesuksesan.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End page header -->

    <!-- ============================= >>>>> Begin about us section <<<<< ============================= -->
    <section id="about-us-section">
        <div class="about-us-inner tt-wrap">
            <div class="split-box" data-aos="fade-up" data-aos-duration="800">
                <div class="container-fluid">
                    <div class="row g-0">
                        <!-- Split box image -->
                        <div class="col-12 col-lg-6 split-box-image-holder">
                            <div class="split-box-image bg-image" 
                                style="background-image: url('{{ isset($about) && $about && $about->image_url ? asset($about->image_url) : asset('aivo/assets/img/misc/us-2.jpg') }}');">
                            </div>
                        </div>

                        <!-- Split box content -->
                        <div class="col-12 col-lg-6 split-box-content">
                            <div class="split-box-container">
                                <div class="tt-heading tt-heading-xxlg">
                                    <div class="tt-heading-inner">
                                        <h2 class="tt-heading-title">{{ $about->title ?? 'Tentang Kami' }}</h2>
                                        <div class="tt-heading-subtitle">{{ $about->subtitle ?? 'Perjalanan dan Visi Kami' }}</div>
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
                                @if(isset($about) && $about && $about->achievements)
                                <div class="achievements-wrap margin-top-30">
                                    <div class="row g-3">
                                        @foreach(json_decode($about->achievements) as $achievement)
                                        <div class="col-6">
                                            <div class="achievement-item">
                                                <div class="achievement-icon">
                                                    <i class="bx bx-check-circle"></i>
                                                </div>
                                                <div class="achievement-info">
                                                    <h5 class="achievement-title">{{ $achievement->title }}</h5>
                                                    <div class="achievement-desc">{{ $achievement->description }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    /* About section styling */
    #about-us-section {
        position: relative;
        padding: 80px 0;
    }

    .split-box {
        position: relative;
        width: 100%;
    }

    .split-box-image-holder {
        position: relative;
        min-height: 500px;
        overflow: hidden;
    }

    .split-box-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .split-box-content {
        position: relative;
        background-color: #fff;
        padding: 60px 40px;
    }

    .split-box-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .split-box-content-text {
        margin-top: 30px;
        text-align: justify;
    }

    .achievements-wrap {
        margin-top: 40px;
    }

    .achievement-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: rgba(0, 64, 216, 0.05);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .achievement-item:hover {
        transform: translateY(-2px);
        background: rgba(0, 64, 216, 0.08);
    }

    .achievement-icon {
        color: #0040d8;
        font-size: 1.5rem;
    }

    .achievement-info {
        flex: 1;
    }

    .achievement-title {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: #2d3a4b;
    }

    .achievement-desc {
        font-size: 0.875rem;
        color: #6c7a89;
        margin-top: 2px;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .split-box-image-holder {
            min-height: 400px;
        }

        .split-box-content {
            padding: 40px 20px;
        }
    }

    @media (max-width: 767px) {
        .split-box-image-holder {
            min-height: 300px;
        }

        .split-box-content {
            padding: 30px 15px;
        }

        .achievement-item {
            padding: 12px;
        }
    }

    /* Enhanced visual effects */
    .split-box-image {
        transition: transform 0.3s ease-out;
    }

    .split-box:hover .split-box-image {
        transform: scale(1.05);
    }

    .split-box-content {
        position: relative;
        z-index: 1;
    }

    /* Ensure content doesn't overflow */
    .split-box-content-text {
        overflow-wrap: break-word;
        word-wrap: break-word;
    }
    </style>
    <!-- End about us section -->

    <!-- =============================
    ///// Begin services section /////
    ============================== -->
    <section id="services-section" class="services-style-1 bg-gray-3">
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
            <div class="justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="info-box text-center h-100">
                            <div class="info-box-info">
                                <h3 class="info-box-heading text-info mb-4">Visi</h3>
                                <div class="info-box-text fs-5 px-4">
                                    {{ $about->vision ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-12">
                        <div class="info-box text-center h-100">
                            <div class="info-box-info">
                                <h3 class="info-box-heading text-info mb-4">Misi</h3>
                                <div class="info-box-text fs-5">
                                    @if (!empty($about->mission))
                                        <ul class="list-unstyled mx-auto px-4">
                                            @php $no = 1; @endphp
                                            @foreach (preg_split('/\r\n|\r|\n/', $about->mission) as $point)
                                                @if (trim($point) !== '')
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <span class="fw-bold text-primary me-3" style="min-width: 25px;">
                                                                {{ $no++ }}.
                                                            </span>
                                                            <span class="text-start flex-grow-1">{{ $point }}</span>
                                                        </div>
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

    <!-- =============================
    ///// Begin contact info section /////
    ============================== -->
    <section class="call-to-action-section cta-style-1 bg-dark text-white bg-image" style="background-image: url('{{ asset('aivo/assets/img/pattern/pt-3.png') }}');">
        <div class="cover cover-opacity-7-5"></div>
        <div class="cta-inner tt-wrap">
            <div class="row justify-content-center g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow h-100 bg-transparent text-white">
                        <div class="card-body text-center">
                            <i class="bx bx-map-pin fs-1 mb-2"></i>
                            <h5 class="fw-bold mb-2">Lokasi</h5>
                            <div>
                                {{ $about->location ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow h-100 bg-transparent text-white">
                        <div class="card-body text-center">
                            <i class="bx bx-phone fs-1 mb-2"></i>
                            <h5 class="fw-bold mb-2">Telepon</h5>
                            <div>
                                @if(isset($about) && $about && $about->phone)
                                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $about->phone) }}" class="text-decoration-none text-white">{{ $about->phone }}</a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow h-100 bg-transparent text-white">
                        <div class="card-body text-center">
                            <i class="bx bx-envelope fs-1 mb-2"></i>
                            <h5 class="fw-bold mb-2">Email</h5>
                            <div>
                                @if(isset($about) && $about && $about->email)
                                    <a href="mailto:{{ $about->email }}" class="text-decoration-none text-white">{{ $about->email }}</a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow h-100 bg-transparent text-white">
                        <div class="card-body text-center">
                            <i class="bx bx-globe fs-1 mb-2"></i>
                            <h5 class="fw-bold mb-2">Website</h5>
                            <div>
                                @if(isset($about) && $about && $about->website)
                                    <a href="{{ (strpos($about->website, 'http') === 0 ? $about->website : 'http://'.$about->website) }}" target="_blank" class="text-decoration-none text-white">{{ $about->website }}</a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact info section -->

    <!-- =============================
    ///// Begin CTA section /////
    ============================== -->
    <section class="call-to-action-section cta-style-1 bg-dark text-white bg-image" style="background-image: url('{{ asset('aivo/assets/img/bg/cta-bg.jpg') }}');">
        <div class="cover cover-opacity-7-5"></div>
        <div class="cta-inner tt-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="tt-heading tt-heading-xxlg text-center">
                        <div class="tt-heading-inner">
                            <h1 class="tt-heading-title">Tertarik untuk bekerja sama dengan kami?</h1>
                            <div class="tt-heading-subtitle">Kami siap membantu Anda dalam setiap kebutuhan digital Anda.</div>
                            <div class="zig-zag-separator">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ url('contact') }}" class="btn btn-primary btn-lg">Hubungi Kami!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA section -->
@endsection