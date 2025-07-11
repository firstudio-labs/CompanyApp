@extends('frontend.layouts.app')

@section('title', 'Kontak | Firstudio')
@section('meta_description', 'Hubungi kami untuk informasi lebih lanjut tentang layanan kami')
@section('meta_keywords', 'contact, hubungi kami, alamat, email, telepon, layanan')

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
                    <h1 class="page-header-title text-start">Kontak Kami</h1>
                </div>
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle text-start">Hubungi Kami</h2>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
                <div class="page-header-description">
                    <div class="ph-desc-inner text-start">
                        Hubungi kami untuk informasi lebih lanjut tentang layanan kami.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End page header -->

<!-- Contact Section -->
<section id="contact-section" class="contact-style-1">
    <div class="contact-section-inner tt-wrap">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-md-6">
                <div class="contact-info-wrap margin-bottom-40">
                    <div class="contact-info-text text-justify">
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($about->description ?? 'Silakan hubungi kami untuk pertanyaan, konsultasi, atau kerjasama.'), 488) }}</p>
                    </div>
                    <h3 class="contact-info-title">Visit Us:</h3>
                    <ul class="contact-info">
                        <li>
                            <span class="address">
                                <span class="lnr lnr-home"></span>
                                {{ $about->location ?? 'Alamat belum tersedia' }}
                            </span>
                        </li>
                        <li>
                            <span class="phone">
                                <span class="lnr lnr-phone"></span>
                                {{ $about->phone ?? '-' }}
                            </span>
                        </li>
                        <li>
                            <span class="email">
                                <span class="lnr lnr-envelope"></span>
                                <a href="mailto:{{ $about->email ?? 'info@email.com' }}" target="_blank">{{ $about->email ?? 'info@email.com' }}</a>
                            </span>
                        </li>
                    </ul>
                    {{-- <!-- Social Buttons -->
                    <div class="social-buttons margin-top-25">
                        <h5>Follow Us:</h5>
                        <ul>
                            @if(!empty($about->social_media_facebook))
                                <li><a href="{{ $about->social_media_facebook }}" class="btn btn-social-min btn-default btn-rounded-full" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if(!empty($about->social_media_twitter))
                                <li><a href="{{ $about->social_media_twitter }}" class="btn btn-social-min btn-default btn-rounded-full" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if(!empty($about->social_media_instagram))
                                <li><a href="{{ $about->social_media_instagram }}" class="btn btn-social-min btn-default btn-rounded-full" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            @endif
                            @if(!empty($about->social_media_youtube))
                                <li><a href="{{ $about->social_media_youtube }}" class="btn btn-social-min btn-default btn-rounded-full" title="YouTube" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            @endif
                        </ul>
                    </div> --}}
                </div>
            </div>
            <!-- End Contact Info -->

            <!-- Contact Form -->
            <div class="col-md-6">
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="contact-form-inner">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" placeholder="Your Phone (optional)" value="{{ old('phone') }}">
                                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                           name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                    @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control @error('message') is-invalid @enderror"
                                              name="message" rows="4" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="small text-gray"><em>* All fields except phone are required!</em></div>
                        <button type="submit" class="btn btn-primary margin-top-40">Send Message</button>
                    </div>
                </form>
                @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <!-- End Contact Form -->
        </div>
    </div>
</section>
<!-- End Contact Section -->

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/fontawesome-all.min.css') }}">
<style>
    .contact-info-wrap { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 5px 25px rgba(0,0,0,0.05);}
    .contact-info-title { font-size: 20px; font-weight: 700; margin-top: 30px;}
    .contact-info { list-style: none; padding: 0; margin: 0;}
    .contact-info li { margin-bottom: 18px; font-size: 16px;}
    .contact-info .lnr, .contact-info .fa { margin-right: 10px; color: #696cff;}
    .social-buttons ul { list-style: none; padding: 0; margin: 0; display: flex; gap: 10px;}
    .btn-social-min { width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #f5f5f5; color: #696cff; font-size: 18px; transition: all .2s;}
    .btn-social-min:hover { background: #696cff; color: #fff;}
    .contact-form { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 5px 25px rgba(0,0,0,0.05);}
    .contact-form .form-control, .contact-form select { border-radius: 6px; }
    .contact-form .btn-primary { background: #696cff; border: none; }
    .contact-form .btn-primary:hover { background: #4b4fcb; }
    #tt-map { margin-top: 40px; border-radius: 10px; overflow: hidden;}
</style>
@endpush

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script>
    // Simple Google Map (replace with your coordinates)
    function initMap() {
        var myLatLng = { lat: -6.200000, lng: 106.816666 };
        var map = new google.maps.Map(document.getElementById('tt-map'), {
            zoom: 14,
            center: myLatLng,
            styles: [ { featureType: "poi", stylers: [ { visibility: "off" } ] } ]
        });
        new google.maps.Marker({ position: myLatLng, map: map, title: "Lokasi Kami" });
    }
    window.initMap = initMap;
    if (typeof google !== 'undefined') { google.maps.event.addDomListener(window, 'load', initMap); }
</script>
@endpush
