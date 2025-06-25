@extends('frontend.layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', isset($about) && $about ? $about->title : 'Tentang Kami')
@section('meta_description', isset($about) && $about && $about->description ? Str::limit(strip_tags($about->description), 160) : 'Profil, visi, dan layanan kami')
@section('meta_keywords', 'about, tentang kami, profil, visi, misi, layanan')

@section('content')
    <!-- ========================
    ///// Begin page header /////
    ============================= -->
    <section id="page-header" class="ph-lg">
        <div class="page-header-image parallax-6 bg-image" style="background-image: url('{{ isset($about) && $about && $about->image_banner ? asset($about->image_banner) : asset('aivo/assets/img/page-header/page-header-bg-4.jpg') }}');">
            <div class="cover cover-opacity-4"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-sm parallax-5">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title">
                        {{ isset($about) && $about ? $about->text_banner : 'Tentang Kami' }}
                    </h1>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <div class="ph-anim-element-wrap ph-anim-circle parallax-4">
            <div class="ph-anim-element-holder">
                <div class="ph-anim-element"></div>
            </div>
        </div>
    </section>
    <!-- End page header -->

    <!-- =============================
    ///// Begin about us section /////
    ============================== -->
    <section id="about-us-section">
        <div class="about-us-inner tt-wrap">
            <div class="split-box">
                <div class="container-fluid">
                    <div class="row row-lg-height">
                        <!-- Split box image -->
                        <div class="col-lg-6 col-lg-height split-box-image no-padding bg-image sbi-shadow" style="background-image: url('{{ isset($about) && $about && $about->image_url ? asset($about->image_url) : asset('aivo/assets/img/misc/us-2.jpg') }}');">
                            <div class="sbi-height padding-height-80"></div>
                        </div>
                        <!-- Split box content -->
                        <div class="col-lg-6 col-lg-height col-lg-middle no-padding">
                            <div class="split-box-content sb-content-right">
                                <div class="tt-heading tt-heading-xxlg">
                                    <div class="tt-heading-inner">
                                        <h2 class="tt-heading-title">{{ $about->title ?? '-' }}</h2>
                                        <div class="tt-heading-subtitle">{{ $about->subtitle ?? '-' }}</div>
                                        <div class="zig-zag-separator">
                                            <span></span><span></span><span></span><span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="split-box-content-text">
                                    {!! isset($about) && $about->description ? $about->description : '<span class="text-muted">Deskripsi tentang kami belum tersedia.</span>' !!}
                                </div>
                                @if(isset($about) && $about && $about->achievements)
                                <div class="row g-3 mb-4">
                                    @foreach(json_decode($about->achievements) as $achievement)
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                                                <i class="bx bx-check-circle fs-4"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">{{ $achievement->title }}</h5>
                                                <small class="text-muted">{{ $achievement->description }}</small>
                                            </div>
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
    <section id="services-section" class="services-style-1 bg-gray-3 bg-pattern" style="background-image: url('{{ asset('aivo/assets/img/pattern/transparent/pt-transparent-2.png') }}');">
        <div class="cover cover-opacity-1 cover-light"></div>
        <div class="services-inner tt-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="tt-heading tt-heading-xxlg text-center margin-bottom-80">
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
                                    @if(!empty($about->mission))
                                        <ul class="list-unstyled text-start d-inline-block mx-auto" style="max-width: 400px;">
                                            @foreach(preg_split('/\r\n|\r|\n/', $about->mission) as $point)
                                                @if(trim($point) !== '')
                                                    <li class="mb-2"><i class="bx bx-check-circle text-primary me-2"></i>{{ $point }}</li>
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
    <section class="call-to-action-section cta-style-1 bg-dark text-white bg-image" style="background-image: url('{{ asset('aivo/assets/img/textures/texture-3.jpg') }}');">
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
                            <h1 class="tt-heading-title">Do You Feel Excited?</h1>
                            <div class="tt-heading-subtitle">Interested in working with us?</div>
                            <div class="zig-zag-separator">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ url('contact') }}" class="btn btn-primary btn-lg">Let's Work Together!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA section -->
@endsection