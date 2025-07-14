@extends('frontend.layouts.app')

@section('title', 'Firstudio - Creative Digital Solutions')
@section('meta_description', 'Firstudio provides creative digital solutions for your business.')
@section('meta_keywords', 'firstudio, digital, creative, agency, portfolio, service')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aivo/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
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

    {{-- Custom Responsive Styles --}}
    <style>
        /* Mobile-first responsive design */
        .intro-caption {
            padding: 20px;
        }

        .intro-title {
            font-size: 1.5rem;
            line-height: 1.2;
        }

        .intro-subtitle {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .intro-description {
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        /* Tablet styles */
        @media (min-width: 768px) {
            .intro-title {
                font-size: 2rem;
            }

            .intro-subtitle {
                font-size: 1.4rem;
            }

            .intro-description {
                font-size: 1rem;
            }
        }

        /* Desktop styles */
        @media (min-width: 1024px) {
            .intro-title {
                font-size: 2.5rem;
            }

            .intro-subtitle {
                font-size: 1.6rem;
            }

            .intro-description {
                font-size: 1.1rem;
            }
        }

        /* About section responsive */
        .split-box-content {
            padding: 30px;
        }

        @media (max-width: 991px) {
            .split-box-content {
                padding: 20px;
                margin-top: 30px;
            }

            .split-box-image {
                min-height: 300px;
            }
        }

        /* Services grid responsive */
        .info-box {
            margin-bottom: 30px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .info-box-info {
            flex-grow: 1;
        }

        /* Enhanced Portfolio/Products/Articles Responsive Grid System */

        /* Base isotope container setup */
        .isotope-wrap {
            padding: 0 15px;
        }

        .isotope-items-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: -15px;
        }

        .isotope-item {
            padding: 15px;
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .isotope-item:hover {
            transform: translateY(-5px);
        }

        /* Mobile First - Single column for all content types */
        .isotope.col-3 .isotope-item,
        .isotope.col-4 .isotope-item {
            width: 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        /* Small Mobile optimization */
        @media (max-width: 480px) {
            .isotope-wrap {
                padding: 0 10px;
            }

            .isotope-items-wrap {
                margin: -10px;
            }

            .isotope-item {
                padding: 10px;
            }
        }

        /* Large Mobile - 2 columns for better spacing */
        @media (min-width: 576px) {

            .isotope.col-3 .isotope-item,
            .isotope.col-4 .isotope-item {
                width: 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        /* Tablet - 2 columns maintained for better readability */
        @media (min-width: 768px) {
            .isotope-wrap {
                padding: 0 20px;
            }

            .isotope-items-wrap {
                margin: -20px;
            }

            .isotope-item {
                padding: 20px;
            }

            .isotope.col-3 .isotope-item,
            .isotope.col-4 .isotope-item {
                width: 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        /* Desktop - 3 columns for col-3, 4 columns for col-4 */
        @media (min-width: 992px) {
            .isotope.col-3 .isotope-item {
                width: 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }

            .isotope.col-4 .isotope-item {
                width: 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }
        }

        /* Large Desktop - maintained layout with better spacing */
        @media (min-width: 1200px) {
            .isotope-wrap {
                padding: 0 30px;
            }

            .isotope-items-wrap {
                margin: -25px;
            }

            .isotope-item {
                padding: 25px;
            }
        }

        /* Extra Large Desktop */
        @media (min-width: 1400px) {
            .isotope-wrap {
                max-width: 1320px;
                margin: 0 auto;
            }
        }

        /* Portfolio/Product item enhancements */
        .portfolio-list-item,
        .product-list-item {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .portfolio-list-item:hover,
        .product-list-item:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .pl-item-image-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16/10;
        }

        .pl-item-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
        }

        .portfolio-list-item:hover .pl-item-image,
        .product-list-item:hover .pl-item-image {
            transform: scale(1.05);
        }

        .pl-item-info {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .pl-item-caption {
            margin-bottom: 10px;
        }

        .pl-item-title {
            font-size: 1.2rem;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .pl-item-title a {
            color: #2d3a4b;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .pl-item-title a:hover {
            color: #0040d8;
        }

        .pl-item-category {
            margin-bottom: 10px;
        }

        .pl-item-category a {
            color: #0040d8;
            font-size: 0.9rem;
            text-decoration: none;
            font-weight: 500;
        }

        .pl-item-desc {
            color: #6c7a89;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-top: auto;
        }

        /* Specific styling for Products Section */
        #products-section .isotope-item {
            margin-bottom: 30px;
        }

        /* Specific styling for Articles/Blog Section */
        #latest-news-section .blog-list-item {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        #latest-news-section .blog-list-item:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .bl-item-image-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16/10;
        }

        .bl-item-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
        }

        .blog-list-item:hover .bl-item-image {
            transform: scale(1.05);
        }

        .bl-item-info {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .bl-item-meta {
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: #6c7a89;
        }

        .bl-item-title {
            margin-bottom: 10px;
        }

        .bl-item-title h2 {
            font-size: 1.2rem;
            line-height: 1.3;
            margin: 0;
        }

        .bl-item-title a {
            color: #2d3a4b;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .bl-item-title a:hover {
            color: #0040d8;
        }

        .bl-item-content {
            color: #6c7a89;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-top: auto;
        }

        @media (max-width: 575px) {

            .pl-item-info,
            .bl-item-info {
                padding: 15px;
            }

            .pl-item-title,
            .bl-item-title h2 {
                font-size: 1.1rem;
            }

            .pl-item-desc,
            .bl-item-content {
                font-size: 0.9rem;
            }
        }

        /* Vision Mission responsive */
        .info-box-wrap .info-box {
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-box-wrap .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        /* Counter section responsive */
        .counter-up-wrap {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
        }

        .counter-up-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .counter-up {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .counter-up-title {
            font-size: 0.9rem;
            color: #666;
        }

        @media (max-width: 768px) {
            .counter-up-wrap {
                margin-bottom: 40px;
            }
        }

        /* Article carousel responsive - Enhanced */
        .latest-news-carousel {
            position: relative;
            clear: both;
            margin-top: 40px;
        }

        .custom-article-nav {
            position: absolute;
            top: -70px;
            right: 0;
            z-index: 1000;
            display: flex;
            gap: 12px;
        }

        .article-nav-btn {
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            background: #f8f9fa;
            color: #222;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .article-nav-btn:hover {
            background: #0040d8;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 64, 216, 0.3);
        }

        .article-nav-btn svg path {
            transition: stroke 0.3s ease;
        }

        .article-nav-btn:hover svg path {
            stroke: #fff;
        }

        /* Enhanced article carousel for mobile */
        @media (max-width: 991px) {
            .latest-news-carousel {
                margin-top: 30px;
            }

            .latest-news-carousel .owl-carousel {
                padding: 0 20px;
            }

            .custom-article-nav {
                position: relative;
                top: auto;
                right: auto;
                justify-content: center;
                margin-bottom: 30px;
                padding: 0 20px;
            }
        }

        @media (max-width: 575px) {
            .latest-news-carousel .owl-carousel {
                padding: 0 15px;
            }

            .custom-article-nav {
                margin-bottom: 25px;
                padding: 0 15px;
            }
        }

        /* Enhanced owl carousel responsive */
        .owl-carousel .owl-item {
            backface-visibility: hidden;
            transform: translateZ(0);
        }

        .owl-carousel .owl-stage {
            display: flex;
            align-items: stretch;
        }

        .owl-carousel .owl-stage .owl-item {
            display: flex;
        }

        .owl-carousel .owl-stage .owl-item>div {
            width: 100%;
        }

        /* Filter buttons styling - Enhanced */
        .isotope-filter-wrap {
            margin-bottom: 40px;
            clear: both;
            width: 100%;
        }

        .isotope-filter-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .isotope-filter-link {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            color: #6c7a89;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            cursor: pointer;
            outline: none;
            position: relative;
            overflow: hidden;
        }

        .isotope-filter-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .isotope-filter-link:hover::before {
            left: 100%;
        }

        .isotope-filter-link:hover,
        .isotope-filter-link.active {
            background: #0040d8;
            border-color: #0040d8;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 64, 216, 0.3);
        }

        @media (max-width: 768px) {
            .isotope-filter-wrap {
                margin-bottom: 30px;
            }

            .isotope-filter-links {
                gap: 8px;
            }

            .isotope-filter-link {
                padding: 8px 16px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .isotope-filter-links {
                flex-direction: column;
                align-items: center;
                gap: 6px;
            }

            .isotope-filter-link {
                min-width: 150px;
                text-align: center;
            }
        }

        /* Animation classes */
        .fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .touch-active {
            transform: scale(0.98);
            opacity: 0.9;
        }

        /* Enhanced section spacing */
        section {
            padding: 80px 0;
            position: relative;
            clear: both;
        }

        @media (max-width: 991px) {
            section {
                padding: 60px 0;
            }
        }

        @media (max-width: 575px) {
            section {
                padding: 40px 0;
            }
        }

        /* Enhanced grid system for isotope */
        .isotope-items-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: -15px;
        }

        .isotope-item {
            padding: 15px;
            box-sizing: border-box;
        }

        @media (min-width: 992px) {
            .isotope-items-wrap {
                margin: -20px;
            }

            .isotope-item {
                padding: 20px;
            }
        }

        /* Section container fixes */
        #products-section,
        #latest-news-section {
            overflow: hidden;
        }

        #products-section .isotope-wrap,
        #latest-news-section .isotope-wrap {
            clear: both;
            width: 100%;
        }

        /* Products specific responsive grid */
        #products-section .isotope.col-3 .isotope-item {
            margin-bottom: 30px;
        }

        @media (max-width: 767px) {
            #products-section .isotope.col-3 .isotope-item {
                margin-bottom: 20px;
            }
        }

        /* Articles specific responsive grid */
        #latest-news-section .isotope.col-3 .isotope-item {
            margin-bottom: 30px;
        }

        @media (max-width: 767px) {
            #latest-news-section .isotope.col-3 .isotope-item {
                margin-bottom: 20px;
            }
        }

        /* Enhanced clearfix for sections */
        section::before,
        section::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Performance optimizations */
        .portfolio-list-item,
        .blog-list-item {
            will-change: transform;
        }

        .pl-item-image,
        .bl-item-image {
            will-change: transform;
        }

        /* Focus states for accessibility */
        .isotope-filter-link:focus,
        .article-nav-btn:focus,
        .portfolio-list-item:focus,
        .blog-list-item:focus {
            outline: 3px solid rgba(0, 64, 216, 0.5);
            outline-offset: 2px;
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {

            .portfolio-list-item,
            .blog-list-item {
                border: 2px solid #000;
            }

            .isotope-filter-link {
                border-width: 3px;
            }
        }

        /* Critical fixes for Products and Articles sections */

        /* Ensure proper section isolation */
        #products-section {
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        #latest-news-section {
            position: relative;
            z-index: 2;
            overflow: hidden;
            clear: both;
        }

        /* Specific grid fixes for Products */
        #products-section .isotope-wrap {
            width: 100%;
            max-width: 100%;
            overflow: hidden;
        }

        #products-section .isotope-items-wrap {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        #products-section .isotope.col-3 .isotope-item {
            box-sizing: border-box;
        }

        /* Specific grid fixes for Articles */
        #latest-news-section .latest-news-carousel {
            width: 100%;
            clear: both;
            margin-top: 40px;
        }

        /* Improved spacing between sections */
        #products-section+#latest-news-section {
            margin-top: 0;
            padding-top: 80px;
        }

        @media (max-width: 991px) {
            #products-section+#latest-news-section {
                padding-top: 60px;
            }
        }

        @media (max-width: 575px) {
            #products-section+#latest-news-section {
                padding-top: 40px;
            }
        }

        /* Enhanced carousel navigation positioning */
        .latest-news-carousel .custom-article-nav {
            position: absolute;
            top: -60px;
            right: 0;
            z-index: 10;
        }

        @media (max-width: 991px) {
            .latest-news-carousel .custom-article-nav {
                position: static;
                top: auto;
                right: auto;
                justify-content: center;
                margin-bottom: 30px;
            }
        }

        /* Ensure proper image aspect ratios */
        .product-list-item .pl-item-image-wrap,
        .blog-list-item .bl-item-image-wrap {
            width: 100%;
            height: 0;
            padding-bottom: 60%;
            position: relative;
            overflow: hidden;
            border-radius: 12px 12px 0 0;
        }

        /* Mobile-specific improvements */
        @media (max-width: 767px) {

            #products-section .isotope.col-3 .isotope-item,
            #latest-news-section .isotope.col-3 .isotope-item {
                width: 100% !important;
                margin-bottom: 25px;
            }

            .isotope-wrap {
                padding: 0 10px;
            }
        }

        /* Tablet-specific improvements */
        @media (min-width: 768px) and (max-width: 991px) {

            #products-section .isotope.col-3 .isotope-item,
            #latest-news-section .isotope.col-3 .isotope-item {
                width: 50% !important;
                margin-bottom: 30px;
            }
        }

        /* Desktop-specific improvements */
        @media (min-width: 992px) {

            #products-section .isotope.col-3 .isotope-item,
            #latest-news-section .isotope.col-3 .isotope-item {
                width: 33.333333% !important;
                margin-bottom: 40px;
            }
        }

        /* Enhanced responsive styles */
        .custom-article-nav {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            gap: 18px;
            margin: 18px 18px 0 0;
        }

        @media (max-width: 767px) {
            .custom-article-nav {
                position: relative;
                top: 0;
                right: auto;
                justify-content: center;
                margin: 0 0 20px 0;
            }
        }

        .custom-article-nav .article-nav-btn {
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            background: #f1f2f3;
            color: #222;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            outline: none;
            cursor: pointer;
            padding: 0;
            touch-action: manipulation;
        }

        .custom-article-nav .article-nav-btn:hover,
        .custom-article-nav .article-nav-btn:focus,
        .custom-article-nav .article-nav-btn:active {
            background: #0040d8;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 64, 216, 0.3);
        }

        .custom-article-nav .article-nav-btn svg path {
            transition: stroke 0.3s ease;
        }

        .custom-article-nav .article-nav-btn:hover svg path,
        .custom-article-nav .article-nav-btn:focus svg path,
        .custom-article-nav .article-nav-btn:active svg path {
            stroke: #fff;
        }

        /* Enhanced portfolio tech stack styles */
        .portfolio-techstack .badge {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #2d3a4b;
            border: 1px solid #dee2e6;
            font-size: 0.85rem;
            font-weight: 500;
            margin-right: 5px;
            margin-bottom: 5px;
            padding: 0.35em 0.75em;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .portfolio-techstack .badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #0040d8 0%, #0033b3 100%);
            color: white;
            border-color: #0040d8;
        }

        .portfolio-techstack img {
            width: 16px;
            height: 16px;
            object-fit: contain;
            margin-right: 5px;
            vertical-align: middle;
            border-radius: 2px;
        }

        /* Enhanced loading states */
        .lazy {
            background-color: #f8f9fa;
            background-image: linear-gradient(45deg, transparent 25%, rgba(255, 255, 255, .5) 25%, rgba(255, 255, 255, .5) 75%, transparent 75%, transparent),
                linear-gradient(45deg, transparent 25%, rgba(255, 255, 255, .5) 25%, rgba(255, 255, 255, .5) 75%, transparent 75%, transparent);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            animation: loading-shimmer 1.5s ease-in-out infinite;
            transition: all 0.3s ease;
        }

        .lazy.loaded {
            animation: none;
            background-image: none;
        }

        @keyframes loading-shimmer {
            0% {
                background-position: 0 0, 10px 10px;
            }

            100% {
                background-position: 20px 20px, 30px 30px;
            }
        }

        /* Enhanced info box responsive design */
        .info-box {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
        }

        .info-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(0, 64, 216, 0.03) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .info-box:hover::before {
            opacity: 1;
        }

        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        /* Enhanced button styles */
        .btn {
            transition: all 0.3s ease;
            border-radius: 8px;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        /* Final responsive fixes and optimizations */

        /* Improved aspect ratio handling */
        .pl-item-image-wrap,
        .bl-item-image-wrap {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 0;
            padding-bottom: 62.5%;
            /* 16:10 aspect ratio */
        }

        .pl-item-image,
        .bl-item-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
        }

        /* Improved grid spacing for different screen sizes */
        @media (max-width: 1199px) and (min-width: 992px) {
            .isotope.col-3 .isotope-item {
                margin-bottom: 25px;
            }
        }

        @media (max-width: 991px) and (min-width: 768px) {
            .isotope.col-3 .isotope-item {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 767px) and (min-width: 576px) {
            .isotope.col-3 .isotope-item {
                margin-bottom: 25px;
            }
        }

        @media (max-width: 575px) {
            .isotope.col-3 .isotope-item {
                margin-bottom: 20px;
            }
        }

        /* Section background improvements */
        .bg-gray-1 {
            background-color: #f8f9fa !important;
        }

        .bg-gray-2 {
            background-color: #e9ecef !important;
        }

        /* Improved container max-width */
        .isotope-wrap {
            max-width: 100%;
            margin: 0 auto;
        }

        @media (min-width: 1400px) {
            .isotope-wrap {
                max-width: 1320px;
            }
        }

        /* Fix for overlapping content */
        .isotope-items-wrap::after {
            content: "";
            display: block;
            clear: both;
            height: 0;
            visibility: hidden;
        }

        /* Improved mobile navigation for carousels */
        @media (max-width: 767px) {
            .custom-article-nav {
                position: static;
                justify-content: center;
                margin: 20px 0;
                gap: 15px;
            }

            .article-nav-btn {
                position: relative;
                z-index: 10;
            }
        }

        /* Enhanced touch interactions */
        @media (hover: none) and (pointer: coarse) {

            .portfolio-list-item:hover,
            .blog-list-item:hover {
                transform: none;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            }

            .pl-item-image:hover,
            .bl-item-image:hover {
                transform: none;
            }
        }

        /* Improved loading performance */
        .isotope-item {
            contain: layout style paint;
        }

        /* Better text overflow handling */
        .pl-item-title,
        .bl-item-title h2 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .pl-item-desc,
        .bl-item-content {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
@endpush

@section('content')
    <div id="body-content">

        {{-- Intro Section --}}
        <section id="tt-intro" class="intro-full-m">
            <div class="tt-intro-inner">
                <div class="owl-carousel cursor-grab bg-dark cc-hover-zoom" data-items="1" data-loop="true"
                    data-dots="false" data-nav="true" data-autoplay="true" data-autoplay-timeout="8000"
                    data-autoplay-hover-pause="true" data-animate-in="fadeIn" data-animate-out="fadeOut">
                    @foreach ($slides as $slide)
                        <div class="cc-item">
                            <div class="intro-image-wrap parallax-6">
                                <div class="intro-image bg-dark bg-image"
                                    style="background-image: url('{{ $slide->image_url }}');">
                                    <div class="cover cover-opacity-5"></div>
                                </div>
                            </div>
                            <div
                                class="intro-caption-wrap caption-animate intro-caption-xxlg center parallax-4 fade-out-scroll-5">
                                <div class="intro-caption-holder">
                                    <div class="intro-caption center">
                                        <h1 class="intro-title">{{ $slide->title }}</h1>
                                        <h2 class="intro-subtitle">{{ $slide->subtitle }}</h2>
                                        <div class="intro-description">{!! $slide->description !!}</div>
                                        @if ($slide->button_link)
                                            <div class="intro-buttons">
                                                <a href="{{ $slide->button_link }}"
                                                    class="btn btn-primary margin-top-5 margin-right-10" target="_blank">
                                                    {{ $slide->button_text ?? 'Learn More' }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

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
                                        <b>Firstudio</b> adalah <i>digital agency</i> yang mendampingi <b>UKM</b> dan <b>korporasi</b> menghadapi tantangan era digital melalui <b>solusi teknologi yang tepat guna</b>, mulai dari <b>konsultasi IT</b>, <b>pembuatan website</b>, <b>aplikasi</b>, hingga <b>pengembangan IoT</b>. Kami percaya <b>teknologi harus mempermudah, meningkatkan efisiensi, dan menciptakan dampak nyata</b>. Dengan pendekatan yang <b>suportif</b> dan <b>kolaboratif</b>, kami hadir sebagai <b>mitra yang tumbuh bersama klien</b>. Didukung tim profesional di bidang teknologi, desain, dan riset, kami memadukan <b>kreativitas</b> dan <b>data</b> untuk menciptakan <b>solusi digital yang inovatif, relevan, dan berkelanjutan</b>, berlandaskan nilai inti kami: <b>Future, Innovative, Research, Solution, Technology (FIRST)</b>.
                                    </div>
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
                    ///// Begin Visi & Misi section /////
                    ============================== -->
                    <section id="services-section" class="services-style-1 bg-gray-3">
                        <div class="cover cover-opacity-1 cover-light"></div>
                        <div class="services-inner tt-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tt-heading tt-heading-xxlg text-center">
                                        <div class="tt-heading-inner ">
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
                                            <div class="info-box-info padding-20">
                                                <h3 class="info-box-heading text-info mb-4">Visi</h3>
                                                <div class="info-box-text fs-5 px-4">
                                                    {{ $about->vision ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-12">
                                        <div class="info-box text-center h-100">
                                            <div class="info-box-info padding-20">
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

        {{-- Services Section --}}
        <section id="services-section" class="services-style-1">
            <div class="services-inner tt-wrap">
                <div class="tt-heading tt-heading-lg text-center padding-on padding-20">
                    <div class="tt-heading tt-heading-xxlg text-center">
                        <div class="tt-heading-inner">
                            <h1 class="tt-heading-title">Layanan Kami</h1>
                            <div class="tt-heading-subtitle">Layanan yang kami tawarkan</div>
                            <div class="zig-zag-separator">
                                <span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box-wrap ib-style-2 ib-icon-bg-shape">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                <div class="info-box h-100">
                                    <span class="info-box-icon">
                                        <img src="{{ asset($service->image_url) }}" alt="{{ $service->title }}" class="img-fluid rounded">
                                    </span> 
                                    <div class="info-box-info">
                                        <h3 class="info-box-heading">
                                            <a href="{{ route('services.show', $service->slug) }}">
                                                {{ $service->title }}
                                            </a>
                                        </h3>
                                        <div class="info-box-text tt-ellipsis">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($service->description), 100) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Video Promo Section
        <section class="video-promo-section bg-image"
            style="background-image: url('{{ asset('aivo/assets/img/misc/misc-5.jpg') }}');">
            <div class="cover cover-opacity-5"></div>
            <div class="video-promo-inner tt-wrap">
                <div class="video-promo-caption">
                    <div class="tt-heading tt-heading-xlg text-center text-white">
                        <div class="tt-heading-inner tt-wrap">
                            <h1 class="tt-heading-title">Video Promo</h1>
                            <div class="tt-heading-subtitle">Watch our video presentation</div>
                        </div>
                    </div>
                    <div class="video-promo-btn-wrap vpb-animated lightgallery">
                        <a href="{{ $about->video_url ?? 'https://vimeo.com/9176726' }}"
                            class="video-promo-btn lg-trigger" 
                            data-poster="{{ asset('aivo/assets/img/misc/video-thumb.jpg') }}"
                            aria-label="Play Video">
                            <span class="lnr lnr-camera-video"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <!-- Section Testimoni (Aivo style) -->
        <section id="testimonials-section" class="bg-dark bg-image"
            style="background-image: url('aivo/assets/img/misc/testimonials-bg-3.jpg');">
            <span class="cover cover-opacity-7"></span>
            <div class="testimonials-section-inner tt-wrap">
                <div class="testimonials-carousel tm-center tm-hide-image">
                    <div class="owl-carousel cursor-grab dots-outside dots-rounded" data-lazy-load="true" data-items="1"
                        data-loop="true" data-autoheight="true" data-dots-speed="800" data-autoplay="true"
                        data-autoplay-timeout="8000" data-autoplay-speed="800" data-autoplay-hover-pause="true">
                        <!-- Testimoni 1 -->
                        <div class="cc-item">
                            <div class="testimonial-item text-white">
                                <div class="tm-image-wrap">
                                    <div class="tm-image bg-image owl-lazy"
                                        data-src="aivo/assets/img/blog/small/avatar/avatar-2.jpg"></div>
                                </div>
                                <blockquote>
                                    <p>"Kami adalah perusahaan yang terpercaya oleh klien kami, kami akan memberikan solusi
                                        terbaik untuk klien kami."</p>
                                    <small>Klien Kami</small>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Testimoni 2 -->
                        <div class="cc-item">
                            <div class="testimonial-item text-white">
                                <div class="tm-image-wrap">
                                    <div class="tm-image bg-image owl-lazy"
                                        data-src="aivo/assets/img/blog/small/avatar/avatar-3.jpg"></div>
                                </div>
                                <blockquote>
                                    <p>"Kami adalah perusahaan yang terpercaya oleh klien kami, kami akan memberikan solusi
                                        terbaik untuk klien kami."</p>
                                    <small>Klien Kami</small>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Testimoni 3 -->
                        <div class="cc-item">
                            <div class="testimonial-item text-white">
                                <div class="tm-image-wrap">
                                    <div class="tm-image bg-image owl-lazy"
                                        data-src="aivo/assets/img/blog/small/avatar/avatar-4.jpg"></div>
                                </div>
                                <blockquote>
                                    <p>"Kami adalah perusahaan yang terpercaya oleh klien kami, kami akan memberikan solusi
                                        terbaik untuk klien kami."</p>
                                    <small>Klien Kami</small>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- Portfolio Grid Section --}}
        <section id="portfolio-list-section" class="bg-gray-3 bg-pattern" style="padding-bottom: 100px;">
            <div class="tt-wrap">
                <div class="tt-heading tt-heading-lg padding-on padding-bottom-20">
                    <div class="tt-heading-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <h1 class="tt-heading-title">Proyek Terbaru</h1>
                                <div class="tt-heading-subtitle">Silakan lihat proyek terbaru kami</div>
                                <div class="zig-zag-separator">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-left margin-left-20 mx-auto mt-4 mb-4 fs-5 px-md-5 px-4">
                    <p>Yuk, cari solusi terbaik bareng kami. Gampang, nyaman, dan sesuai kebutuhanmu!</p>
                </div>
                <div class="portfolio-list-inner isotope-wrap">
                    <div class="isotope col-4 gutter-3">
                        <div class="isotope-items-wrap pli-white pli-alter-4">
                            <div class="grid-sizer"></div>
                            @forelse($portfolios as $portfolio)
                                <div
                                    class="isotope-item {{ Str::slug($portfolio->service->title ?? 'all') }} iso-height-1">
                                    <div class="portfolio-list-item">
                                        <div class="pl-item-image-wrap">
                                            <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                                                class="pl-item-image-inner">
                                                <div class="pl-item-image bg-image lazy"
                                                    data-src="{{ $portfolio->image_url ? asset('images/portfolios/' . $portfolio->image_url) : asset('aivo/assets/img/portfolio/list/list-1/portfolio-list-1.jpg') }}">
                                                </div>
                                                <div class="pl-item-icon"><span class="lnr lnr-link"></span></div>
                                            </a>
                                        </div>
                                        <div class="pl-item-info">
                                            <div class="pl-item-caption">
                                                <h2 class="pl-item-title"><a
                                                        href="{{ route('portfolio.show', $portfolio->slug) }}">{{ $portfolio->title }}</a>
                                                </h2>
                                                <div class="pl-item-category">
                                                    @if ($portfolio->service)
                                                        <a
                                                            href="{{ route('services.show', $portfolio->service->slug) }}">{{ $portfolio->service->title }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info text-center py-5">
                                        <i class="lnr lnr-inbox mb-3 d-block" style="font-size: 3rem; opacity: 0.5;"></i>
                                        <h5>Tidak Ada Proyek Tersedia</h5>
                                        <p class="mb-0">Kami sedang mengerjakan beberapa proyek luar biasa. Silakan cek
                                            kembali nanti!</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Products Section --}}
        <section id="products-section" class="bg-gray-1" style="padding-bottom: 100px;">
            <div class="products-inner tt-wrap">
                <div class="tt-heading tt-heading-lg padding-on padding-bottom-20">
                    <div class="tt-heading-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <h1 class="tt-heading-title">Produk Terbaru</h1>
                                <div class="tt-heading-subtitle">Silakan lihat produk terbaru kami</div>
                                <div class="zig-zag-separator">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-left margin-left-20 mx-auto mt-4 mb-4 fs-5 px-md-5 px-4">
                    <p>Inovasi nggak pernah berhenti di sini, kami siap dukung bisnismu dengan produk-produk terkini.</p>
                </div>
                <div class="portfolio-list-inner isotope-wrap">
                    <div class="isotope col-4 gutter-3">
                        <div class="isotope-items-wrap pli-white pli-alter-4">
                            <div class="grid-sizer"></div>
                            @forelse($products as $product)
                                <div class="isotope-item {{ Str::slug($product->service->title ?? 'all') }} iso-height-1">
                                    <div class="portfolio-list-item">
                                        <div class="pl-item-image-wrap">
                                            <a href="{{ route('products.show', $product->slug) }}" class="pl-item-image-inner">
                                                <div class="pl-item-image bg-image lazy"
                                                    data-src="{{ $product->image_url ? asset('images/products/' . $product->image_url) : asset('aivo/assets/img/portfolio/list/list-1/portfolio-list-1.jpg') }}">
                                                </div>
                                                <div class="pl-item-icon"><span class="lnr lnr-link"></span></div>
                                            </a>
                                        </div>
                                        <div class="pl-item-info">
                                            <div class="pl-item-caption">
                                                <h2 class="pl-item-title">
                                                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
                                                </h2>
                                                <div class="pl-item-category">
                                                    @if ($product->service)
                                                        <a href="{{ route('services.show', $product->service->slug) }}">{{ $product->service->title }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info text-center py-5">
                                        <i class="lnr lnr-store mb-3 d-block" style="font-size: 3rem; opacity: 0.5;"></i>
                                        <h5>Tidak Ada Produk Tersedia</h5>
                                        <p class="mb-0">Kami sedang mengembangkan produk-produk luar biasa. Nantikan update dari kami!</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Blog/News Section --}}
        <section id="latest-news-section" class="bg-gray-3">
            <div class="latest-news-section-inner tt-wrap">
                <div class="tt-heading tt-heading-xlg text-center margin-bottom-80">
                    <div class="tt-heading-inner">
                        <h1 class="tt-heading-title">Artikel Terbaru</h1>
                        <div class="tt-heading-subtitle">Artikel terbaru dari blog kami</div>
                        <div class="zig-zag-separator">
                            <span></span><span></span><span></span><span></span>
                        </div>
                        <div class="tt-heading-text">
                            <p>Yuk, cek artikel terbaru di blog kami! Isinya update-info yang sayang banget buat dilewatkan.</p>
                        </div>
                    </div>
                </div>



                <div class="latest-news-carousel">
                    <div class="owl-carousel cursor-grab nav-outside-top nav-rounded" data-lazy-load="true"
                        data-items="3" data-margin="30" data-loop="true" data-dots="false" data-nav="false"
                        data-nav-speed="500" data-autoplay="true" data-autoplay-timeout="5000" data-autoplay-speed="500"
                        data-autoplay-hover-pause="true" data-tablet-landscape="2" data-tablet-portrait="2"
                        data-mobile-landscape="1" data-mobile-portrait="1">
                        @forelse($articles as $article)
                            <div class="cc-item">
                                <article class="blog-list-item">
                                    <div class="bl-item-image-wrap">
                                        <a href="{{ route('article.show', $article->slug) }}"
                                            class="bl-item-image bg-image owl-lazy"
                                            data-src="{{ asset($article->image_url) }}"></a>
                                    </div>
                                    <div class="bl-item-info">
                                        <div class="bl-item-category">
                                            @if ($article->service)
                                                <a
                                                    href="{{ route('services.show', $article->service->slug) }}">{{ $article->service->title }}</a>
                                            @endif
                                        </div>
                                        <a href="{{ route('article.show', $article->slug) }}" class="bl-item-title">
                                            <h2>{{ $article->title }}</h2>
                                        </a>
                                        <div class="bl-item-meta">
                                            <span
                                                class="published">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('l, d F Y') }}</span>
                                            <span class="posted-by">- by <a
                                                    href="#">{{ $article->author ?? 'Admin' }}</a></span>
                                        </div>
                                        <div class="bl-item-desc">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @empty
                            <div class="cc-item">
                                <div class="alert alert-info text-center py-5">
                                    <i class="lnr lnr-bookmark mb-3 d-block" style="font-size: 3rem; opacity: 0.5;"></i>
                                    <h5>No Articles Available</h5>
                                    <p class="mb-0">We're working on some great content. Check back soon!</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <!-- =============================================
                    ///// Begin call to action section (style-2) /////
                    ============================================== -->
        <section class="call-to-action-section cta-style-2 bg-dark text-white bg-image"
            style="background-image: url({{ asset('assets/img/pattern/pt-2.jpg') }});">

            <div class="cover cover-gradient-dark cover-opacity-9"></div>

            <div class="cta-inner tt-wrap">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="tt-heading tt-heading-xxlg">
                            <div class="tt-heading-inner">
                                <h1 class="tt-heading-title">Apakah Anda Tertarik?</h1>
                                <div class="tt-heading-subtitle">Tertarik untuk bekerja sama dengan kami?</div>
                                <div class="zig-zag-separator zig-zag-light">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <p>Kami di sini karena kepercayaan itu penting. Dan tugas kami? Kasih solusi terbaik buat kamu.</p>
                        <div class="margin-top-30">
                            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg margin-top-5">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End call to action section (style-2) -->

        {{-- Clients Section --}}
        <section id="clients-section" class="clients-style-1">
            <div class="clients-inner tt-wrap">
                <div class="row">

                    <div class="col-lg-push-7 col-lg-5">

                        <!-- Bagian Judul Klien -->
                        <div class="tt-heading tt-heading-xlg">
                            <div class="tt-heading-inner">
                                <h1 class="tt-heading-title">Klien</h1>
                                <div class="tt-heading-subtitle">Klien yang telah mempercayai kami</div>
                                <div class="zig-zag-separator">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="tt-heading-text">
                                    Dipercaya klien, kami siap selalu memberikan yang terbaik.
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Judul Klien -->

                    </div> <!-- /.col -->

                    <div class="col-lg-pull-5 col-lg-7">

                        <!-- Daftar Klien -->
                        <ul class="client-list">
                            @foreach ($clients as $client)
                                <li>
                                    <a target="_blank" href="{{ $client->website_url ?? '#' }}" title="{{ $client->company_name }}">
                                        <img src="{{ asset('images/clients/' . $client->company_logo) }}" alt="{{ $client->company_name }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Akhir Daftar Klien -->

                    </div> <!-- /.col -->
                </div> <!-- /.row -->

            </div> <!-- /.clients-inner -->
        </section>

        {{-- Fun Facts Section --}}
        {{-- <section id="funn-facts-section" class="bg-main ff-light bg-pattern"
            style="background-image: url('{{ asset('aivo/assets/img/pattern/transparent/pt-transparent-6.png') }}');">
            <div class="funn-facts-inner tt-wrap">
                <div class="cover cover-opacity-4 cover-color"></div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-users"></i></div>
                            <div class="counter-up">{{ $about->customers_count ?? 97 }}</div>
                            <h4 class="counter-up-title">Klien yang telah mempercayai kami</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-leaf"></i></div>
                            <div class="counter-up">{{ $about->projects_count ?? 24 }}</div>
                            <h4 class="counter-up-title">Proyek yang telah kami selesaikan</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-trophy"></i></div>
                            <div class="counter-up">{{ $about->awards_count ?? 86 }}</div>
                            <h4 class="counter-up-title">Penghargaan yang telah kami peroleh</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="counter-up-wrap cu-animated">
                            <div class="counter-up-icon"><i class="fas fa-life-ring"></i></div>
                            <div class="counter-up">{{ $about->support_count ?? 32 }}</div>
                            <h4 class="counter-up-title">Dukungan yang telah kami berikan</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('aivo/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/ytplayer/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.dotdotdot.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery-lazy/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/vendor/jquery-lazy/js/jquery.lazy.plugins.min.js') }}"></script>
    <script src="{{ asset('aivo/assets/js/theme.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Enhanced Isotope configuration for better responsive behavior
            function initIsotope(selector) {
                var $iso = $(selector).imagesLoaded(function() {
                    $iso.isotope({
                        itemSelector: '.isotope-item',
                        layoutMode: 'fitRows',
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.grid-sizer'
                        },
                        fitRows: {
                            gutter: 30
                        }
                    });

                    // Refresh layout on window resize with debounce
                    let resizeTimer;
                    $(window).on('resize', function() {
                        clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(function() {
                            $iso.isotope('layout');
                        }, 250);
                    });
                });
                return $iso;
            }

            // Initialize Isotope for both sections
            var $isoPortfolio = initIsotope('#portfolio-list-section .isotope-items-wrap');
            var $isoProducts = initIsotope('#products-section .isotope-items-wrap');

            // Enhanced Filter functionality with smooth animations
            function setupFilter(sectionSelector, isoElement) {
                $(sectionSelector + ' .isotope-filter-links .isotope-filter-link').on('click', function() {
                    var $filterLinks = $(sectionSelector + ' .isotope-filter-links .isotope-filter-link');
                    $filterLinks.removeClass('active');
                    $(this).addClass('active');

                    var filterValue = $(this).attr('data-filter');
                    isoElement.isotope({
                        filter: filterValue,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                });
            }

            // Setup filters for both sections
            setupFilter('#portfolio-list-section', $isoPortfolio);
            setupFilter('#products-section', $isoProducts);

            // Enhanced lazy loading with error handling and fade-in effect
            function setupLazyLoading(selector) {
                $(selector + ' .lazy').each(function() {
                    var $el = $(this);
                    var src = $el.data('src');
                    if (src) {
                        var img = new Image();
                        img.onload = function() {
                            $el.css('background-image', 'url(' + src + ')');
                            $el.addClass('loaded');
                        };
                        img.onerror = function() {
                            $el.css('background-image', 'url(' +
                                '{{ asset('aivo/assets/img/misc/no-image.jpg') }}' + ')');
                            $el.addClass('loaded');
                        };
                        img.src = src;
                    }
                });
            }

            // Apply lazy loading to all sections
            setupLazyLoading('#portfolio-list-section');
            setupLazyLoading('#products-section');

            // Enhanced custom article navigation with keyboard support
            $('.custom-article-nav .article-prev').on('click touchend keydown', function(e) {
                if (e.type === 'keydown' && e.keyCode !== 13 && e.keyCode !== 32) return;
                e.preventDefault();
                $('.latest-news-carousel .owl-carousel').trigger('prev.owl.carousel');
            });

            $('.custom-article-nav .article-next').on('click touchend keydown', function(e) {
                if (e.type === 'keydown' && e.keyCode !== 13 && e.keyCode !== 32) return;
                e.preventDefault();
                $('.latest-news-carousel .owl-carousel').trigger('next.owl.carousel');
            });

            // Enhanced counter animation with intersection observer
            if ('IntersectionObserver' in window) {
                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            $(entry.target).find('.counter-up').each(function() {
                                const $counter = $(this);
                                const finalValue = parseInt($counter.text());
                                $counter.text('0');

                                $({
                                    counter: 0
                                }).animate({
                                    counter: finalValue
                                }, {
                                    duration: 2000,
                                    easing: 'swing',
                                    step: function() {
                                        $counter.text(Math.ceil(this.counter));
                                    }
                                });
                            });
                            counterObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.5
                });

                document.querySelectorAll('.counter-up-wrap').forEach(el => {
                    counterObserver.observe(el);
                });
            }

            // Smooth scroll behavior for anchor links
            $('a[href^="#"]').on('click', function(e) {
                const target = $($(this).attr('href'));
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800, 'easeInOutQuart');
                }
            });

            // Enhanced carousel initialization with responsive settings
            $('.latest-news-carousel .owl-carousel').owlCarousel({
                items: 3,
                margin: 30,
                loop: true,
                dots: false,
                nav: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                smartSpeed: 750,
                lazyLoad: true,
                responsive: {
                    0: {
                        items: 1,
                        margin: 15
                    },
                    576: {
                        items: 1,
                        margin: 20
                    },
                    768: {
                        items: 2,
                        margin: 25
                    },
                    992: {
                        items: 2,
                        margin: 30
                    },
                    1200: {
                        items: 3,
                        margin: 30
                    }
                },
                onInitialized: function(event) {
                    // Add fade-in animation for carousel items
                    $('.latest-news-carousel .owl-item').each(function(index) {
                        $(this).css('animation-delay', (index * 0.1) + 's');
                        $(this).addClass('fadeInUp');
                    });
                }
            });

            // Parallax effect for hero section (if exists)
            if ($('.intro-image').length) {
                $(window).on('scroll', function() {
                    const scrolled = $(this).scrollTop();
                    const rate = scrolled * -0.5;
                    $('.intro-image').css('transform', 'translateY(' + rate + 'px)');
                });
            }

            // Enhanced touch support for mobile devices
            if ('ontouchstart' in window) {
                $('.portfolio-list-item, .blog-list-item').on('touchstart', function() {
                    $(this).addClass('touch-active');
                }).on('touchend', function() {
                    $(this).removeClass('touch-active');
                });
            }

            // Loading animation for isotope items
            setTimeout(function() {
                $('.isotope-item').each(function(index) {
                    $(this).css('animation-delay', (index * 0.1) + 's');
                    $(this).addClass('fadeInUp');
                });
            }, 500);

            // Enhanced error handling for images
            $('img').on('error', function() {
                $(this).attr('src', '{{ asset('aivo/assets/img/misc/placeholder.jpg') }}');
            });

            // Keyboard navigation support
            $(document).on('keydown', function(e) {
                if (e.target.tagName.toLowerCase() !== 'input' && e.target.tagName.toLowerCase() !==
                    'textarea') {
                    if (e.keyCode === 37) { // Left arrow
                        $('.article-prev').trigger('click');
                    } else if (e.keyCode === 39) { // Right arrow
                        $('.article-next').trigger('click');
                    }
                }
            });

            // Performance optimization: preload critical images
            const criticalImages = [
                '{{ asset('aivo/assets/img/misc/no-image.jpg') }}',
                '{{ asset('aivo/assets/img/misc/placeholder.jpg') }}'
            ];

            criticalImages.forEach(src => {
                const img = new Image();
                img.src = src;
            });
        });
    </script>
@endpush
