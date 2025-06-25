{{-- filepath: resources/views/frontend/product/show.blade.php --}}
@extends('frontend.layouts.app')

@section('title', $product->title)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($product->description), 160))
@section('meta_keywords', $product->title . ', produk, layanan, firstudio, haji, qurban')

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
                    <h1 class="page-header-title">{{ $product->title }}</h1>
                </div>
                @if($product->subtitle)
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle">{{ $product->subtitle }}</h2>
                </div>
                @endif
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span><span></span><span></span><span></span>
                </div>
                @if($product->short_description)
                <div class="page-header-description">
                    <div class="ph-desc-inner">
                        {{ $product->short_description }}
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
    ///// Begin product single section /////
    ====================================== -->
    <section id="portfolio-single-section">
        <div class="portfolio-single-inner tt-wrap">
            <!-- Begin product single info -->
            <div class="portfolio-single-info tt-wrap margin-bottom-60">
                <div class="row">
                    <div class="col-sm-push-5 col-md-push-4 col-xs-12 col-sm-7 col-md-8">
                        <!-- Begin product single text -->
                        <div class="portfolio-single-text">
                            <h2 class="mb-3">{{ $product->title }}</h2>
                            @if($product->short_description)
                                <p class="lead">{{ $product->short_description }}</p>
                            @endif
                            {!! $product->description !!}
                            @if($product->link)
                                <p class="margin-top-20">
                                    <a href="{{ $product->link }}" target="_blank" class="btn btn-primary btn-sm">
                                        <i class="fas fa-external-link-alt"></i> Visit Project
                                    </a>
                                </p>
                            @endif
                        </div>
                        <!-- End product single text -->
                    </div>
                    <div class="col-sm-pull-7 col-md-pull-8 col-xs-12 col-sm-5 col-md-4">
                        <!-- Begin product single attributes -->
                        <div class="ps-attributes">
                            <ul class="ps-attr">
                                <li>
                                    <div class="ps-category">
                                        <div class="ps-attr-heading">Kategori:</div>
                                        <div class="ps-attr-cont">
                                            <a href="#">{{ $product->service->title ?? '-' }}</a>
                                        </div>
                                    </div>
                                </li>
                                @if($product->client)
                                <li>
                                    <div class="ps-attr-heading">Klien:</div>
                                    <div class="ps-attr-cont">{{ $product->client }}</div>
                                </li>
                                @endif
                                @if($product->link)
                                <li>
                                    <div class="ps-attr-heading">Website:</div>
                                    <div class="ps-attr-cont">
                                        <a href="{{ $product->link }}" target="_blank">{{ $product->link }}</a>
                                    </div>
                                </li>
                                @endif
                                @if($product->techStacks && $product->techStacks->count())
                                <li>
                                    <div class="ps-attr-heading">Technology:</div>
                                    <div class="ps-attr-cont">
                                        @foreach($product->techStacks as $stack)
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
                                <li>
                                    <div class="ps-attr-heading">Tanggal:</div>
                                    <div class="ps-attr-cont">
                                        {{ $product->created_at ? $product->created_at->format('d M Y') : '-' }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End product single attributes -->
                    </div>
                </div>
            </div>
            <!-- End product single info -->

            <!-- Begin product single gallery -->
            <div class="portfolio-single-gallery lightgallery">
                <figure class="portfolio-single-image-holder">
                    <a href="{{ $product->image_url ? asset('images/products/' . $product->image_url) : asset('assets/img/placeholder-image.png') }}" class="ps-image-link lg-trigger">
                        <div class="portfolio-single-image">
                            <img class="lazy" data-src="{{ $product->image_url ? asset('images/products/' . $product->image_url) : asset('assets/img/placeholder-image.png') }}" alt="{{ $product->title }}">
                            <div class="ps-image-icon">
                                <span class="lnr lnr-eye"></span>
                            </div>
                        </div>
                    </a>
                </figure>
                {{-- Tambahkan gambar lain jika ada gallery --}}
                @if(isset($product->gallery) && is_array($product->gallery))
                    @foreach($product->gallery as $img)
                    <figure class="portfolio-single-image-holder">
                        <a href="{{ asset('images/products/' . $img) }}" class="ps-image-link lg-trigger">
                            <div class="portfolio-single-image">
                                <img class="lazy" data-src="{{ asset('images/products/' . $img) }}" alt="Gallery">
                                <div class="ps-image-icon">
                                    <span class="lnr lnr-eye"></span>
                                </div>
                            </div>
                        </a>
                    </figure>
                    @endforeach
                @endif
            </div>
            <!-- End product single gallery -->
        </div>
    </section>
    <!-- End product single section -->
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
