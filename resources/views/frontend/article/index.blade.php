{{-- filepath: resources/views/frontend/article/index.blade.php --}}
@extends('frontend.layouts.app')

@section('title', 'Artikel')
@section('meta_description', 'Artikel, berita, dan update terbaru dari Firstudio')
@section('meta_keywords', 'blog, artikel, berita, haji, qurban, layanan, firstudio')

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
        .isotope-items-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }
        .isotope-item {
            flex: 1 1 30%;
            display: flex;
            min-width: 280px;
            max-width: 100%;
        }
        .blog-list-item {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            min-height: 500px;
            max-height: 600px;
            box-sizing: border-box;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border-radius: 6px;
        }
        .bl-item-image-wrap {
            width: 100%;
            aspect-ratio: 16/9;
            overflow: hidden;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            flex-shrink: 0;
        }
        .bl-item-image {
            display: block;
            width: 100%;
            height: 100%;
            background-size: cover !important;
            background-position: center !important;
            min-height: 180px;
        }
        .bl-item-info {
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 24px 20px 16px 20px;
            overflow: hidden;
        }
        .bl-item-title h2, .bl-item-desc {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .bl-item-desc {
            min-height: 50px;
            max-height: 60px;
        }
        /* Responsive */
        @media (max-width: 991px) {
            .isotope-item { flex: 1 1 45%; }
        }
        @media (max-width: 600px) {
            .isotope-item { flex: 1 1 100%; }
        }
    </style>
@endsection

@section('content')
    <!-- ========================
    ///// Begin page header /////
    ============================= -->
    <section id="page-header" class="ph-sm">
        <div class="page-header-image parallax-6 bg-image" style="background-image: url('{{ asset('aivo/assets/img/pattern/pt-1.png') }}');">
            <div class="cover cover-opacity-4"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-xlg ph-cap-light ph-cap-shadow parallax-5 fade-out-scroll-4 text-start">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title text-start" style="color: #fff;">Artikel</h1>
                </div>
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle text-start">Kumpulan Artikel & Berita</h2>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="page-header-description">
                    <div class="ph-desc-inner text-start">
                        Temukan berbagai artikel, berita, dan informasi terbaru seputar layanan, teknologi, dan inspirasi dari kami.
                    </div>
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

    <!-- =====================================
    ///// Begin blog list section (grid) /////
    ====================================== -->
    <section id="blog-list-section" class="blog-list-grid">
        <div class="blog-list-inner tt-wrap">
            <div class="row no-margin">
                <div class="col-md-12 no-padding-left no-padding-right">
                    <div class="isotope-wrap">
                        <div class="isotope col-3 gutter-4">
                            <div class="isotope-items-wrap no-margin">
                                <div class="grid-sizer"></div>
                                @forelse($articles as $article)
                                    <div class="isotope-item">
                                        <article class="blog-list-item">
                                            <div class="bl-item-image-wrap">
                                                <a href="{{ route('article.show', $article->slug) }}"
                                                   class="bl-item-image bg-image lazy"
                                                   data-src="{{ $article->image_url ? asset($article->image_url) : asset('aivo/assets/img/blog/list/blog-1.jpg') }}"
                                                   title="{{ $article->title }}">
                                                </a>
                                            </div>
                                            <div class="bl-item-info">
                                                <div class="bl-item-category">
                                                    @if($article->service)
                                                        <a href="#">{{ $article->service->name }}</a>
                                                    @endif
                                                </div>
                                                <a href="{{ route('article.show', $article->slug) }}" class="bl-item-title">
                                                    <h2>{{ $article->title }}</h2>
                                                </a>
                                                <div class="bl-item-meta">
                                                    <span class="published">
                                                        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('M d, Y') : '-' }}
                                                    </span>
                                                    <span class="posted-by">
                                                        - by <a href="#" title="View all posts by {{ $article->author ?? '-' }}">{{ $article->author ?? '-' }}</a>
                                                    </span>
                                                </div>
                                                <div class="bl-item-desc">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                                                </div>
                                                <ul class="bl-item-attr">
                                                    <li>
                                                        <a href="{{ route('article.show', $article->slug) }}#blog-post-comments" class="bl-item-comments-count" title="Read comments">
                                                            <i class="far fa-comment"></i> {{ $article->comments_count ?? 0 }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                @empty
                                    <div class="col-12 text-center text-gray-500 py-5">
                                        <i class="fas fa-info-circle text-2xl mb-2"></i>
                                        <div>Belum ada artikel.</div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="tt-pagination-wrap">
                        {{ $articles->links() }}
                        <div class="tt-pagination-info">
                            <span>
                                Menampilkan halaman {{ $articles->currentPage() }} dari {{ $articles->lastPage() }}
                            </span>
                            <span>
                                Artikel {{ $articles->firstItem() }}-{{ $articles->lastItem() }} dari {{ $articles->total() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog list section -->
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
            // Lazy load bg images
            $('.lazy').each(function() {
                var $el = $(this);
                $el.css('background-image', 'url(' + $el.data('src') + ')');
            });
        });
    </script>
@endsection
