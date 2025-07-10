{{-- filepath: resources/views/frontend/portfolio/show.blade.php --}}
@extends('frontend.layouts.app')

@section('title', $portfolio->title)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($portfolio->description), 160))
@section('meta_keywords', $portfolio->title . ', portfolio, project, ' . ($portfolio->service->title ?? ''))

@section('styles')
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
    <style>
        .portfolio-single-inner {
            max-width: 1200px;
        }
        .portfolio-single-info {
            background: #fff;
            border-radius: 1.25rem;
            box-shadow: 0 2px 12px rgba(44,62,80,0.08);
            padding: 2rem 1.5rem 1.5rem 1.5rem;
            margin-bottom: 40px;
        }
        .ps-attributes .ps-attr {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .ps-attr-heading {
            font-weight: 600;
            color: #2d3a4b;
            margin-bottom: 2px;
        }
        .ps-attr-cont {
            color: #6c7a89;
            margin-bottom: 10px;
        }
        .portfolio-single-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
        }
        .portfolio-single-image-holder {
            width: 48%;
            margin-bottom: 0.5rem;
        }
        .portfolio-single-image {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
        }
        .portfolio-single-image img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }
        .ps-image-icon {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            background: rgba(44,62,80,0.7);
            color: #fff;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.2s;
            font-size: 1.1rem;
        }
        .portfolio-single-image-holder:hover .ps-image-icon {
            opacity: 1;
        }
        @media (max-width: 991px) {
            .portfolio-single-gallery { flex-direction: column; }
            .portfolio-single-image-holder { width: 100%; }
        }
    </style>
@endsection

@section('content')
    <section id="page-header">
        <div class="page-header-image hide-ph-image parallax-6 bg-image" style="background-image: url('{{ asset('assets/img/page-header/page-header-bg-9.jpg') }}');">
            <div class="cover cover-opacity-4"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-lg parallax-5">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title">{{ $portfolio->title }}</h1>
                </div>
                @if($portfolio->subtitle)
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle">{{ $portfolio->subtitle }}</h2>
                </div>
                @endif
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
                @if($portfolio->short_description)
                <div class="page-header-description">
                    <div class="ph-desc-inner">
                        {{ $portfolio->short_description }}
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="ph-anim-element-wrap parallax-4">
            <div class="ph-anim-element-holder">
                <div class="ph-anim-element"></div>
            </div>
        </div>
    </section>
    <section id="portfolio-single-section">
        <div class="portfolio-single-inner tt-wrap">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="portfolio-single-info margin-bottom-40">
                        <div class="portfolio-single-text">
                            {!! $portfolio->description !!}
                        </div>
                        <div class="ps-attributes">
                            <ul class="ps-attr">
                                <li>
                                    <div class="ps-category">
                                        <div class="ps-attr-heading">Kategori:</div>
                                        <div class="ps-attr-cont">{{ $portfolio->service->title ?? '-' }}</div>
                                    </div>
                                </li>
                                @if($portfolio->client)
                                <li>
                                    <div class="ps-attr-heading">Client:</div>
                                    <div class="ps-attr-cont">{{ $portfolio->client }}</div>
                                </li>
                                @endif
                                @if($portfolio->year)
                                <li>
                                    <div class="ps-attr-heading">Tahun:</div>
                                    <div class="ps-attr-cont">{{ $portfolio->year }}</div>
                                </li>
                                @endif
                                @if($portfolio->techStacks && $portfolio->techStacks->count())
                                <li>
                                    <div class="ps-attr-heading">Teknologi:</div>
                                    <div class="ps-attr-cont">
                                        @foreach($portfolio->techStacks as $stack)
                                            <span class="badge" style="background:#f8f9fa;color:#2d3a4b;border:1px solid #e5eaf2;margin-right:2px;">
                                                @if($stack->icon)
                                                    <img src="{{ asset('storage/'.$stack->icon) }}" alt="{{ $stack->name }}" style="width:18px;height:18px;object-fit:contain;margin-right:3px;">
                                                @endif
                                                {{ $stack->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </li>
                                @endif
                                @if($portfolio->link)
                                <li>
                                    <div class="ps-attr-heading">Website:</div>
                                    <div class="ps-attr-cont"><a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a></div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-8">
                    <div class="portfolio-single-gallery lightgallery">
                        <figure class="portfolio-single-image-holder">
                            <a href="{{ $portfolio->image_url ? asset('images/portfolios/' . $portfolio->image_url) : asset('assets/img/placeholder-image.png') }}" class="ps-image-link lg-trigger" data-exthumbnail="{{ $portfolio->image_url ? asset('images/portfolios/' . $portfolio->image_url) : asset('assets/img/placeholder-image.png') }}">
                                <div class="portfolio-single-image">
                                    <img src="{{ $portfolio->image_url ? asset('images/portfolios/' . $portfolio->image_url) : asset('assets/img/placeholder-image.png') }}" alt="{{ $portfolio->title }}">
                                    <div class="ps-image-icon">
                                        <span class="lnr lnr-eye"></span>
                                    </div>
                                </div>
                            </a>
                        </figure>
                        @if(isset($portfolio->gallery) && is_array($portfolio->gallery) && count($portfolio->gallery))
                            @foreach($portfolio->gallery as $img)
                            <figure class="portfolio-single-image-holder">
                                <a href="{{ asset('images/portfolios/' . $img) }}" class="ps-image-link lg-trigger" data-exthumbnail="{{ asset('images/portfolios/' . $img) }}">
                                    <div class="portfolio-single-image">
                                        <img src="{{ asset('images/portfolios/' . $img) }}" alt="Gallery">
                                        <div class="ps-image-icon">
                                            <span class="lnr lnr-eye"></span>
                                        </div>
                                    </div>
                                </a>
                            </figure>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="project-carousel-section">
        <div class="project-carousel-inner">
            <div class="tt-heading tt-heading-xlg margin-bottom-80 text-center">
                <div class="tt-heading-inner tt-wrap">
                    <h1 class="tt-heading-title">Project Lainnya</h1>
                    <div class="tt-heading-subtitle">Project lain yang mungkin Anda suka</div>
                    <div class="zig-zag-separator">
                        <span></span><span></span><span></span><span></span>
                    </div>
                </div>
            </div>
            <div class="alert alert-info text-center">Carousel project lain akan tampil di sini (fitur coming soon).</div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/lightgallery/js/lightgallery.min.js') }}"></script>
    <script>
        $(function(){
            if ($('.lightgallery').length) {
                $('.lightgallery').lightGallery({ selector: '.ps-image-link' });
            }
        });
    </script>
@endsection

