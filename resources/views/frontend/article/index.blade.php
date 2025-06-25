{{-- filepath: resources/views/frontend/article/index.blade.php --}}
@extends('frontend.layouts.app')

@section('title', 'Blog')
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
@endsection

@section('content')
    <!-- ========================
    ///// Begin page header /////
    ============================= -->
    <section id="page-header" class="ph-sm">
        <div class="page-header-image hide-ph-image parallax-6 bg-image" style="background-image: url('{{ asset('aivo/assets/img/page-header/page-header-bg-13.jpg') }}');">
            <div class="cover cover-opacity-4"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-xlg parallax-5">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title">Blog</h1>
                </div>
                <div class="ph-subtitle-wrap">
                    <h2 class="page-header-subtitle">Articles &amp; News</h2>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
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
