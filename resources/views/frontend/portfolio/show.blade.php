{{-- filepath: resources/views/frontend/portfolio/show.blade.php --}}
@extends('frontend.layouts.app')

@section('title', $portfolio->title)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($portfolio->description), 160))
@section('meta_keywords', $portfolio->title . ', portfolio, project, ' . ($portfolio->service->title ?? ''))

@section('content')
    <!-- ========================
    ///// Begin page header /////
    ============================= -->
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
    <!-- End page header -->

    <!-- =====================================
    ///// Begin portfolio single section /////
    ====================================== -->
    <section id="portfolio-single-section">
        <div class="portfolio-single-inner tt-wrap">
            <!-- Begin portfolio single info -->
            <div class="portfolio-single-info tt-wrap margin-bottom-60">
                <div class="row">
                    <div class="col-sm-push-5 col-md-push-4 col-xs-12 col-sm-7 col-md-8">
                        <!-- Begin portfolio single text -->
                        <div class="portfolio-single-text">
                            <h2 class="mb-3">{{ $portfolio->title }}</h2>
                            @if($portfolio->short_description)
                                <p class="lead">{{ $portfolio->short_description }}</p>
                            @endif
                            {!! $portfolio->description !!}
                            @if($portfolio->link)
                                <p class="margin-top-20">
                                    <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-primary btn-sm">
                                        <i class="fas fa-external-link-alt"></i> Visit Project
                                    </a>
                                </p>
                            @endif
                        </div>
                        <!-- End portfolio single text -->
                    </div>
                    <div class="col-sm-pull-7 col-md-pull-8 col-xs-12 col-sm-5 col-md-4">
                        <!-- Begin portfolio single attributes -->
                        <div class="ps-attributes">
                            <ul class="ps-attr">
                                <li>
                                    <div class="ps-category">
                                        <div class="ps-attr-heading">Category:</div>
                                        <div class="ps-attr-cont">
                                            <a href="#">{{ $portfolio->service->title ?? '-' }}</a>
                                        </div>
                                    </div>
                                </li>
                                @if($portfolio->client)
                                <li>
                                    <div class="ps-attr-heading">Client:</div>
                                    <div class="ps-attr-cont">{{ $portfolio->client }}</div>
                                </li>
                                @endif
                                @if($portfolio->link)
                                <li>
                                    <div class="ps-attr-heading">Website:</div>
                                    <div class="ps-attr-cont">
                                        <a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a>
                                    </div>
                                </li>
                                @endif
                                @if($portfolio->techStacks && $portfolio->techStacks->count())
                                <li>
                                    <div class="ps-attr-heading">Technology:</div>
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
                            </ul>
                        </div>
                        <!-- End portfolio single attributes -->
                    </div>
                </div>
            </div>
            <!-- End portfolio single info -->

            <!-- Begin portfolio single gallery -->
            <div class="portfolio-single-gallery lightgallery">
                <figure class="portfolio-single-image-holder">
                    <a href="{{ $portfolio->image_url ? asset('images/portfolios/' . $portfolio->image_url) : asset('assets/img/placeholder-image.png') }}" class="ps-image-link lg-trigger">
                        <div class="portfolio-single-image">
                            <img class="lazy" data-src="{{ $portfolio->image_url ? asset('images/portfolios/' . $portfolio->image_url) : asset('assets/img/placeholder-image.png') }}" alt="{{ $portfolio->title }}">
                            <div class="ps-image-icon">
                                <span class="lnr lnr-eye"></span>
                            </div>
                        </div>
                    </a>
                </figure>
                {{-- Tambahkan gambar lain jika ada gallery --}}
                @if(isset($portfolio->gallery) && is_array($portfolio->gallery))
                    @foreach($portfolio->gallery as $img)
                    <figure class="portfolio-single-image-holder">
                        <a href="{{ asset('images/portfolios/' . $img) }}" class="ps-image-link lg-trigger">
                            <div class="portfolio-single-image">
                                <img class="lazy" data-src="{{ asset('images/portfolios/' . $img) }}" alt="Gallery">
                                <div class="ps-image-icon">
                                    <span class="lnr lnr-eye"></span>
                                </div>
                            </div>
                        </a>
                    </figure>
                    @endforeach
                @endif
            </div>
            <!-- End portfolio single gallery -->
        </div>
    </section>
    <!-- End portfolio single section -->

    {{-- Optional: More Projects carousel, sticky share, nav, footer, dsb. --}}
@endsection

@push('scripts')
<script>
    $(function(){
        $('.lazy').each(function(){
            var $el = $(this);
            $el.attr('src', $el.data('src'));
        });
        if ($('.lightgallery').length) {
            $('.lightgallery').lightGallery({ selector: '.ps-image-link' });
        }
    });
</script>
@endpush

