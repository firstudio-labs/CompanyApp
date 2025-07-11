@extends('frontend.layouts.app')

@section('title', $article->title)
@section('meta_description', $article->subtitle ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 160))
@section('meta_keywords', $article->service?->name . ', blog, artikel, berita, haji, qurban, layanan, firstudio')

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
    <section id="page-header" class="ph-lg">
        <div class="page-header-image parallax-6 bg-image" style="background-image: url('{{ $article->image_url ? asset($article->image_url) : asset('aivo/assets/img/blog/list/blog-1.jpg') }}');">
            <div class="cover cover-opacity-4"></div>
        </div>
        <div class="page-header-inner tt-wrap">
            <div class="page-header-caption ph-cap-lg ph-cap-light ph-cap-shadow parallax-5 fade-out-scroll-4">
                <div class="ph-title-wrap">
                    <h1 class="page-header-title">{{ $article->title }}</h1>
                </div>
                <div class="zig-zag-separator zig-zag-lg">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </section>
    <!-- End page header -->

    <!-- ====================================
    /////// Begin blog single section ///////
    ===================================== -->
    <section id="blog-single-section">
        <div class="blog-single-inner tt-wrap">
            <div class="row no-margin">
                <!-- Content column -->
                <div class="col-md-8 no-padding-left no-padding-right">
                    <!-- Begin blog single post -->
                    <article class="blog-single-post">
                        <div class="blog-single-post-heading">
                            <div class="blog-single-post-category">
                                @if($article->service)
                                    <a href="#">{{ $article->service->name }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="blog-single-post-title">{{ $article->title }}</div>
                        <div class="blog-single-meta-wrap">
                            <a href="#" class="author-avatar pull-left bg-image" style="background-image: url('{{ asset('aivo/assets/img/blog/small/avatar/avatar-1.jpg') }}');"></a>
                            <div class="blog-single-meta">
                                <div class="article-author">Author: <a href="#">{{ $article->author ?? '-' }}</a></div>
                                <div class="article-time-cat">
                                    <span class="article-time">
                                        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : '-' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <ul class="blog-single-links list-unstyled list-inline">
                            <li>
                                {{-- <a href="#blog-post-comments" class="blog-single-comment-count sm-scroll" title="Read the comments">
                                    <i class="far fa-comment"></i> {{ $article->comments_count ?? 0 }}
                                </a> --}}
                            </li>
                        </ul>
                        <div class="post-content lightgallery mt-3">
                            @if($article->subtitle)
                                <p class="lead" style="font-size:1.1rem;color:#64748b;">{{ $article->subtitle }}</p>
                            @endif
                            {!! $article->content !!}
                        </div>
                        <div class="blog-single-attributes margin-top-60">
                            <div class="row">
                                {{-- <div class="col-sm-8">
                                    <div class="blog-single-tags">
                                        <ul>
                                            <li><span>Tags:</span></li>
                                            @if($article->service)
                                                <li><a href="#">{{ $article->service->name }}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-sm-4 text-right">
                                    <ul class="blog-single-links list-unstyled list-inline">
                                        <li>
                                            <a href="#post-comment-form" class="leave-comment-btn sm-scroll">Leave a Comment</a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                        <div class="blog-single-share bss-fixed-bottom">
                            <div class="bss-text">Share This Post:</div>
                            <ul>
                                <li><a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="btn btn-social-min btn-facebook" title="Share on facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" class="btn btn-social-min btn-twitter" title="Share on twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($article->title) }}" class="btn btn-social-min btn-linkedin" title="Share on linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </article>
                    <!-- End blog single post -->

                    {{-- Related Posts --}}
                    @if($recentArticles->count())
                    <div class="related-posts">
                        <h3 class="related-posts-heading">You Might Also Like:</h3>
                        <div class="related-posts-list">
                            @foreach($recentArticles as $recent)
                                <a href="{{ route('article.show', $recent->slug) }}" class="related-posts-item">
                                    <img src="{{ $recent->image_url ? asset($recent->image_url) : asset('aivo/assets/img/blog/list/blog-1.jpg') }}" alt="{{ $recent->title }}" class="related-posts-img">
                                    <div class="related-posts-title">{{ $recent->title }}</div>
                                    <div class="related-posts-date">
                                        {{ $recent->published_at ? \Carbon\Carbon::parse($recent->published_at)->format('d M Y') : '-' }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    
                </div>
                <!-- Sidebar column -->
                <div class="col-md-4 no-padding-left no-padding-right">
                    <div class="sidebar sidebar-right">
                        <div class="sidebar-widget blog-author no-margin-top">
                            <h3 class="sidebar-heading">About Author</h3>
                            <a href="#" class="blog-author-img bg-image lazy" data-src="{{ asset('aivo/assets/img/blog/small/avatar/avatar-1.jpg') }}"></a>
                            <div class="blog-author-info">
                                <h4 class="blog-author-name"><a href="#">{{ $article->author ?? '-' }}</a></h4>
                                <div class="blog-author-sub">Penulis Artikel</div>
                                <p class="blog-author-text">Artikel ini dipublikasikan oleh {{ $article->author ?? '-' }}{{ $article->service ? ' - ' . $article->service->name : '' }}.</p>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-search">
                            <h3 class="sidebar-heading">Search</h3>
                            <form id="blog-search-form" class="form-btn-inside" method="get" action="{{ route('article') }}">
                                <div class="form-group no-margin">
                                    <input type="text" class="form-control" id="blog-search" name="search" placeholder="Search...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        @if($recentArticles->count())
                        <div class="sidebar-widget sidebar-post-list">
                            <h3 class="sidebar-heading">Artikel Terbaru</h3>
                            <ul class="list-unstyled">
                                @foreach($recentArticles as $recent)
                                    <li>
                                        <a href="{{ route('article.show', $recent->slug) }}" class="post-thumb bg-image lazy" data-src="{{ $recent->image_url ? asset($recent->image_url) : asset('aivo/assets/img/blog/list/blog-1.jpg') }}"></a>
                                        <div class="post-data">
                                            <h5 class="post-title"><a href="{{ route('article.show', $recent->slug) }}">{{ $recent->title }}</a></h5>
                                            <span class="date">{{ $recent->published_at ? \Carbon\Carbon::parse($recent->published_at)->format('d M Y') : '-' }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- <div class="sidebar-widget sidebar-tags">
                            <h3 class="sidebar-heading">Tags</h3>
                            <ul>
                                @if($article->service)
                                    <li><a href="#">{{ $article->service->name }}</a></li>
                                @endif
                                <li><a href="#">#blog</a></li>
                                <li><a href="#">#artikel</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <!-- End Sidebar column -->
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('aivo/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/lightgallery/js/lightgallery.min.js') }}"></script>
    <script>
        $(function(){
            $('.lazy').each(function(){
                var $el = $(this);
                if ($el.is('img')) {
                    $el.attr('src', $el.data('src'));
                } else {
                    $el.css('background-image', 'url(' + $el.data('src') + ')');
                }
            });
            if ($('.lightgallery').length) {
                $('.lightgallery').lightGallery({ selector: '.lg-trigger, a' });
            }
            if ($('.related-posts-list').length && $('.related-posts-list .related-posts-item').length > 2) {
                $('.related-posts-list').addClass('owl-carousel').owlCarousel({
                    items: 3,
                    margin: 20,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: { items: 1 },
                        600: { items: 2 },
                        1000: { items: 3 }
                    }
                });
            }
        });
    </script>
@endsection