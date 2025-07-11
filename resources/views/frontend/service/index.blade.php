@extends('frontend.layouts.app')

@section('title', 'Layanan Kami | Firstudio')
@section('meta_description', 'Daftar layanan terbaik dari kami untuk kebutuhan bisnis dan digital Anda.')
@section('meta_keywords', 'layanan, jasa, service, digital, web, aplikasi, desain, branding')

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
                    <h1 class="page-header-title text-start">Layanan Kami</h1>
                </div>
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle text-start">Apa yang Kami Tawarkan</h2>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
                <div class="page-header-description">
                    <div class="ph-desc-inner text-start">
                        Temukan berbagai layanan profesional kami yang siap membantu kebutuhan bisnis dan digital Anda.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End page header -->

    <!-- =======================================
    ///// Begin services section (style-1) /////
    ============================================ -->
    <section id="services-section" class="services-style-1">
        <div class="services-inner tt-wrap">
            <div class="info-box-wrap ib-boxed ib-icon-color">
                <div class="row">
                    @forelse($services as $service)
                        <div class="col-sm-6 col-md-4 mb-4">
                            <div class="info-box h-100 shadow-sm rounded-3 bg-white">
                                <span class="info-box-icon">
                                    @if($service->image_url)
                                        <img src="{{ asset($service->image_url) }}" alt="{{ $service->title }}" style="width:60px;height:60px;object-fit:cover;border-radius:12px;">
                                    @else
                                        <span class="lnr lnr-cog"></span>
                                    @endif
                                </span>
                                <div class="info-box-info">
                                    <h3 class="info-box-heading">
                                        <a href="{{ route('services.show', $service->slug) }}" class="text-decoration-none text-dark">
                                            {{ $service->title }}
                                        </a>
                                    </h3>
                                    <div class="info-box-text tt-ellipsis" style="min-height:70px;">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($service->description), 90) }}
                                    </div>
                                    <a href="{{ route('services.show', $service->slug) }}" class="btn btn-sm btn-primary mt-3">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">Belum ada layanan tersedia.</div>
                        </div>
                    @endforelse
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- End services section -->

    <!-- CTA Section -->
    <section class="call-to-action-section cta-style-2 bg-image" style="background-image: url('{{ asset('aivo/assets/img/pattern/pt-3.png') }}');">
        <div class="cta-inner tt-wrap">
            <div class="row">
                <div class="col-md-6">
                    <div class="tt-heading tt-heading-xxlg">
                        <div class="tt-heading-inner">
                            <h1 class="tt-heading-title">What Next?</h1>
                            <div class="tt-heading-subtitle">Tertarik bekerja sama dengan kami?</div>
                            <div class="zig-zag-separator">
                                <span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p>Konsultasikan kebutuhan digital Anda bersama tim profesional kami. Kami siap membantu Anda berkembang!</p>
                    <div class="margin-top-30">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg margin-top-5">Hubungi Kami!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection