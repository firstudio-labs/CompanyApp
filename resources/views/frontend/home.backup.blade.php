@extends('frontend.layouts.app')

@section('title', 'Firstudio - Creative Digital Solutions')
@section('meta_description', 'Firstudio provides creative digital solutions for your business.')
@section('meta_keywords', 'firstudio, digital, creative, agency, portfolio, service')

@section('styles')
<style>
    /* Modern Gray Color Scheme with Enhanced Variables */
    :root {
        --primary-gray: #6B7280;
        --primary-dark: #1F2937;
        --primary-light: #F9FAFB;
        --secondary-gray: #9CA3AF;
        --white: #FFFFFF;
        --black: #111827;
        --text-dark: #1F2937;
        --text-light: #6B7280;
        --accent-gray: #4B5563;
        --gradient-hero: linear-gradient(135deg, #F3F4F6 0%, #E5E7EB 100%);
        --gradient-section: linear-gradient(135deg, #F9FAFB 0%, #E5E7EB 100%);
        --shadow-card: 0 8px 30px rgba(0,0,0,0.08);
        --shadow-hover: 0 15px 40px rgba(0,0,0,0.12);
        --transition-base: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        --border-radius: 16px;
        --section-spacing: 8rem;
    }
    
    /* Base Styles */
    * {
        scroll-behavior: smooth;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.7;
        color: var(--text-dark);
        background-color: var(--white);
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    
    /* Typography Enhancements */
    h1, h2, h3, h4, h5, h6 {
        font-weight: 800;
        line-height: 1.2;
        margin-top: 0;
        margin-bottom: 1.5rem;
        color: var(--black);
    }
    
    .display-4 {
        font-weight: 900;
        color: var(--black);
        font-size: 3.5rem;
        letter-spacing: -0.05em;
    }
    
    p {
        margin-top: 0;
        margin-bottom: 1.5rem;
        color: var(--text-dark);
        font-size: 1.1rem;
    }
    
    /* Layout Components */
    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        max-width: 1200px;
    }
    
    /* Hero Section - Enhanced with Typing Effect */
    .hero-section {
        background: var(--gradient-hero);
        padding: var(--section-spacing) 0;
        position: relative;
        overflow: hidden;
        min-height: 90vh;
        display: flex;
        align-items: center;
        will-change: transform;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%231F2937' fill-opacity='0.03'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: backgroundFloat 25s linear infinite;
        will-change: transform;
    }
    
    @keyframes backgroundFloat {
        0% { transform: translate(0, 0); }
        100% { transform: translate(-50%, -50%); }
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .typing-text {
        min-height: 120px;
        position: relative;
    }
    
    .typing-text::after {
        content: '|';
        animation: blink 1s infinite;
        color: var(--primary-gray);
    }
    
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }
    
    .hero-section .lead {
        color: var(--text-dark);
        font-size: 1.3rem;
        font-weight: 400;
        margin-bottom: 2.5rem;
        max-width: 600px;
        opacity: 0.9;
    }
    
    /* Buttons - Enhanced with Hover Effects */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        cursor: pointer;
        transition: var(--transition-base);
        position: relative;
        overflow: hidden;
        border: none;
        outline: none;
        font-weight: 600;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        border-radius: 50px;
        padding: 1.1rem 2.75rem;
        z-index: 1;
    }
    
    .btn-primary-modern {
        background: var(--primary-gray);
        color: var(--white);
        box-shadow: var(--shadow-card);
    }
    
    .btn-primary-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--accent-gray);
        z-index: -1;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s ease;
    }
    
    .btn-primary-modern:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }
    
    .btn-outline-modern {
        border: 2px solid var(--primary-gray);
        color: var(--primary-gray);
        background: rgba(255,255,255,0.9);
    }
    
    .btn-outline-modern:hover {
        background: var(--primary-gray);
        color: var(--white);
    }
    
    /* Section Styling */
    .section-modern {
        padding: var(--section-spacing) 0;
        position: relative;
    }
    
    .section-gray {
        background-color: var(--primary-light);
    }
    
    .section-heading {
        text-align: center;
        margin-bottom: 5rem;
    }
    
    .section-heading h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--black);
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
    }
    
    .section-heading h2::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--primary-gray);
        border-radius: 2px;
    }
    
    .section-heading p {
        font-size: 1.2rem;
        color: var(--text-light);
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* About Section - Enhanced */
    .about-section {
        background: var(--gradient-section);
        color: var(--text-dark);
        padding: var(--section-spacing) 0;
        position: relative;
        overflow: hidden;
    }
    
    .about-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background-image: radial-gradient(circle, rgba(156,163,175,0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        animation: backgroundMove 60s linear infinite;
        pointer-events: none;
    }
    
    @keyframes backgroundMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50%, 50%); }
    }
    
    .about-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .feature-item {
        background: var(--white);
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-card);
        transition: var(--transition-base);
    }
    
    .feature-item:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hover);
    }
    
    .feature-icon {
        font-size: 2.5rem;
        color: var(--primary-gray);
        margin-bottom: 1.5rem;
    }
    
    /* Service Cards - Enhanced with 3D Tilt Effect */
    .service-card {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 3rem 2rem;
        height: 100%;
        transition: var(--transition-base);
        border: 1px solid #E5E7EB;
        box-shadow: var(--shadow-card);
        text-align: center;
        position: relative;
        overflow: hidden;
        will-change: transform;
        transform-style: preserve-3d;
    }
    
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--primary-gray);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.6s ease;
    }
    
    .service-card:hover::before {
        transform: scaleX(1);
    }
    
    .service-card .card-content {
        transform: translateZ(30px);
    }
    
    .service-icon {
        font-size: 3.5rem;
        color: var(--primary-gray);
        margin-bottom: 2rem;
        transition: var(--transition-base);
        display: inline-block;
    }
    
    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
        color: var(--accent-gray);
    }
    
    .service-card h4 {
        color: var(--black);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        font-weight: 700;
    }
    
    /* Statistics Section - New */
    .stats-section {
        background: var(--gradient-section);
        padding: 5rem 0;
        position: relative;
    }
    
    .stat-item {
        text-align: center;
        padding: 2rem;
    }
    
    .stat-number {
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--black);
        margin-bottom: 1rem;
        line-height: 1;
    }
    
    .stat-number .plus {
        color: var(--primary-gray);
    }
    
    .stat-label {
        font-size: 1.1rem;
        color: var(--text-light);
        font-weight: 500;
    }
    
    /* Testimonials Section - New with Swiper */
    .testimonials-section {
        background: var(--white);
        padding: var(--section-spacing) 0;
    }
    
    .testimonial-card {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 3rem;
        box-shadow: var(--shadow-card);
        margin: 1rem;
        position: relative;
    }
    
    .testimonial-card::before {
        content: '"';
        position: absolute;
        top: 2rem;
        left: 2rem;
        font-size: 5rem;
        color: rgba(156, 163, 175, 0.1);
        font-family: serif;
        line-height: 1;
    }
    
    .testimonial-content {
        font-size: 1.1rem;
        color: var(--text-dark);
        margin-bottom: 2rem;
        line-height: 1.8;
        position: relative;
        z-index: 1;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
    }
    
    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 1.5rem;
    }
    
    .author-info h5 {
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }
    
    .author-info p {
        color: var(--text-light);
        margin-bottom: 0;
        font-size: 0.9rem;
    }
    
    /* Portfolio Section - Enhanced with Masonry Layout */
    .portfolio-section {
        padding: var(--section-spacing) 0;
        background: var(--primary-light);
    }
    
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }
    
    .portfolio-card {
        border-radius: var(--border-radius);
        overflow: hidden;
        transition: var(--transition-base);
        box-shadow: var(--shadow-card);
        background: var(--white);
        position: relative;
    }
    
    .portfolio-img-container {
        overflow: hidden;
        height: 280px;
        position: relative;
    }
    
    .portfolio-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
    }
    
    .portfolio-card:hover .portfolio-img {
        transform: scale(1.1);
    }
    
    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(31, 41, 55, 0.8);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: var(--transition-base);
        padding: 2rem;
        color: var(--white);
    }
    
    .portfolio-card:hover .portfolio-overlay {
        opacity: 1;
    }
    
    .portfolio-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        transform: translateY(20px);
        transition: transform 0.4s ease;
    }
    
    .portfolio-card:hover .portfolio-title {
        transform: translateY(0);
    }
    
    .portfolio-category {
        color: var(--secondary-gray);
        margin-bottom: 1.5rem;
        transform: translateY(20px);
        transition: transform 0.4s ease 0.1s;
    }
    
    .portfolio-card:hover .portfolio-category {
        transform: translateY(0);
    }
    
    /* CTA Section - New */
    .cta-section {
        background: var(--gradient-section);
        padding: 6rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%239CA3AF' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        animation: backgroundMove 40s linear infinite;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .cta-title {
        font-size: 2.5rem;
        margin-bottom: 2rem;
    }
    
    /* Footer - New */
    .footer {
        background: var(--primary-dark);
        color: var(--white);
        padding: 5rem 0 2rem;
    }
    
    .footer-logo {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        display: inline-block;
    }
    
    .footer-about {
        margin-bottom: 2rem;
    }
    
    .footer-links h5 {
        color: var(--white);
        margin-bottom: 1.5rem;
        font-size: 1.2rem;
    }
    
    .footer-links ul {
        list-style: none;
        padding: 0;
    }
    
    .footer-links li {
        margin-bottom: 0.8rem;
    }
    
    .footer-links a {
        color: var(--secondary-gray);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .footer-links a:hover {
        color: var(--white);
    }
    
    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    
    .social-links a {
        color: var(--white);
        background: rgba(255,255,255,0.1);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition-base);
    }
    
    .social-links a:hover {
        background: rgba(255,255,255,0.2);
        transform: translateY(-3px);
    }
    
    .copyright {
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 2rem;
        margin-top: 3rem;
        text-align: center;
        color: var(--secondary-gray);
        font-size: 0.9rem;
    }
    
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideUp {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    /* Scroll Reveal Animations */
    [data-animate] {
        opacity: 0;
        transition: all 0.8s ease;
    }
    
    [data-animate="fadeIn"] {
        animation: fadeIn 1s forwards;
    }
    
    [data-animate="slideUp"] {
        animation: slideUp 0.8s forwards;
    }
    
    [data-animate-delay="100"] { animation-delay: 0.1s; }
    [data-animate-delay="200"] { animation-delay: 0.2s; }
    [data-animate-delay="300"] { animation-delay: 0.3s; }
    
    /* Particle Background - New */
    .particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .display-4 {
            font-size: 3rem;
        }
    }
    
    @media (max-width: 992px) {
        .section-heading h2 {
            font-size: 2.4rem;
        }
        
        .hero-section {
            min-height: auto;
            padding: 6rem 0;
        }
        
        .section-modern, .section-gray {
            padding: 6rem 0;
        }
    }
    
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2.5rem;
        }
        
        .section-heading h2 {
            font-size: 2rem;
        }
        
        .section-heading p {
            font-size: 1rem;
        }
        
        .btn {
            padding: 0.9rem 2rem;
            font-size: 1rem;
        }
        
        .portfolio-grid {
            grid-template-columns: 1fr;
        }
        
        .testimonial-card {
            padding: 2rem;
        }
    }
    
    @media (max-width: 576px) {
        .display-4 {
            font-size: 2rem;
        }
        
        .hero-section .lead {
            font-size: 1.1rem;
        }
        
        .section-heading h2 {
            font-size: 1.8rem;
        }
        
        .section-modern, .section-gray {
            padding: 4rem 0;
        }
        
        .service-card {
            padding: 2rem 1.5rem;
        }
    }
</style>
@endsection

@section('content')
    <!-- Loading Overlay with Animation -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="particles" id="particles-js"></div>
        <div class="loader"></div>
    </div>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Hero Section with Typing Effect -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold mb-4" data-animate="slideUp">
                            <span class="typing-text" id="typing-text"></span>
                        </h1>
                        <p class="lead" data-animate="slideUp" data-animate-delay="100">Kami membantu bisnis dan ibadah Anda dengan layanan digital, haji, dan qurban yang profesional dan terpercaya.</p>
                        <div class="d-flex flex-wrap gap-3" data-animate="slideUp" data-animate-delay="200">
                            <a href="#services" class="btn btn-primary-modern">Lihat Layanan</a>
                            <a href="#contact" class="btn btn-outline-modern">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0 text-center" data-animate="fadeIn" data-animate-delay="300">
                    <img src="{{ asset('aivo/assets/img/intro/intro-9.jpg') }}" alt="Hero" class="img-fluid rounded-4 shadow floating" style="max-height:500px;" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section with Features -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-animate="slideUp">
                    <div class="section-heading text-start">
                        <h2>Tentang Kami</h2>
                        <p>Kenali kami lebih dekat dan visi misi perusahaan</p>
                    </div>
                    <p class="mb-4" style="line-height:1.8; font-size: 1.1rem;">
                        {{ $about->description ?? 'Firstudio adalah digital agency yang juga menyediakan layanan ibadah seperti Haji dan Qurban. Kami berkomitmen memberikan solusi kreatif dan spiritual terbaik untuk Anda.' }}
                    </p>
                    <a href="{{ route('about') }}" class="btn btn-outline-modern">Selengkapnya</a>
                    
                    <div class="about-features mt-5">
                        <div class="feature-item" data-animate="slideUp" data-animate-delay="100">
                            <div class="feature-icon">
                                <i class="lni lni-bullseye"></i>
                            </div>
                            <h4>Visi Kami</h4>
                            <p>Menjadi partner terpercaya dalam transformasi digital dan spiritual masyarakat Indonesia.</p>
                        </div>
                        <div class="feature-item" data-animate="slideUp" data-animate-delay="200">
                            <div class="feature-icon">
                                <i class="lni lni-certificate"></i>
                            </div>
                            <h4>Misi Kami</h4>
                            <p>Memberikan solusi terbaik dengan integritas, profesionalisme, dan nilai-nilai islami.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-animate="fadeIn" data-animate-delay="300">
                    <img src="{{ asset($about->image ?? 'aivo/assets/img/hajj1.png') }}" alt="About" class="img-fluid rounded-4 shadow-lg floating" style="max-height:500px;" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6" data-animate="slideUp">
                    <div class="stat-item">
                        <div class="stat-number"><span class="counter" data-count="150">0</span><span class="plus">+</span></div>
                        <div class="stat-label">Proyek Selesai</div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-animate="slideUp" data-animate-delay="100">
                    <div class="stat-item">
                        <div class="stat-number"><span class="counter" data-count="85">0</span><span class="plus">+</span></div>
                        <div class="stat-label">Klien Puas</div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-animate="slideUp" data-animate-delay="200">
                    <div class="stat-item">
                        <div class="stat-number"><span class="counter" data-count="12">0</span><span class="plus">+</span></div>
                        <div class="stat-label">Tahun Pengalaman</div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-animate="slideUp" data-animate-delay="300">
                    <div class="stat-item">
                        <div class="stat-number"><span class="counter" data-count="50">0</span><span class="plus">+</span></div>
                        <div class="stat-label">Penghargaan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section with 3D Effect -->
    <section id="services" class="section-modern">
        <div class="container">
            <div class="section-heading" data-animate="slideUp">
                <h2>Layanan Kami</h2>
                <p>Kami menyediakan berbagai layanan digital dan ibadah yang profesional</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-animate="slideUp" data-animate-delay="100">
                    <div class="service-card glow-on-hover">
                        <div class="card-content">
                            <div class="service-icon">
                                <i class="lni lni-layout"></i>
                            </div>
                            <h4>Web Design</h4>
                            <p>Desain website profesional untuk bisnis dan personal dengan tampilan modern dan responsif yang memukau.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-animate="slideUp" data-animate-delay="200">
                    <div class="service-card glow-on-hover">
                        <div class="card-content">
                            <div class="service-icon">
                                <i class="lni lni-code"></i>
                            </div>
                            <h4>Web Development</h4>
                            <p>Pengembangan aplikasi web canggih sesuai kebutuhan Anda dengan teknologi terkini dan performa optimal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-animate="slideUp" data-animate-delay="300">
                    <div class="service-card glow-on-hover">
                        <div class="card-content">
                            <div class="service-icon">
                                <i class="lni lni-mobile"></i>
                            </div>
                            <h4>Mobile Apps</h4>
                            <p>Pembuatan aplikasi mobile untuk platform iOS dan Android dengan performa tinggi dan UX terbaik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-animate="slideUp" data-animate-delay="100">
                    <div class="service-card glow-on-hover">
                        <div class="card-content">
                            <div class="service-icon">
                                <i class="lni lni-seo"></i>
                            </div>
                            <h4>Digital Marketing</h4>
                            <p>Strategi pemasaran digital komprehensif untuk meningkatkan brand awareness dan penjualan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-animate="slideUp" data-animate-delay="200">
                    <div class="service-card glow-on-hover">
                        <div class="card-content">
                            <div class="service-icon">
                                <i class="lni lni-hajj"></i>
                            </div>
                            <h4>Paket Haji</h4>
                            <p>Layanan ibadah haji dan umroh dengan fasilitas terbaik dan bimbingan spiritual lengkap.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-animate="slideUp" data-animate-delay="300">
                    <div class="service-card glow-on-hover">
                        <div class="card-content">
                            <div class="service-icon">
                                <i class="lni lni-sheep"></i>
                            </div>
                            <h4>Paket Qurban</h4>
                            <p>Layanan qurban online dengan sistem terpercaya dan distribusi tepat sasaran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section with Masonry Grid -->
    <section id="portfolio" class="portfolio-section">
        <div class="container">
            <div class="section-heading" data-animate="slideUp">
                <h2>Hasil Kerja Kami</h2>
                <p>Beberapa portfolio dan produk digital terbaik kami</p>
            </div>
            <div class="portfolio-grid">
                @forelse($portfolios as $portfolio)
                    <div class="portfolio-card" data-animate="fadeIn">
                        @if ($portfolio->image_url)
                            <div class="portfolio-img-container">
                                <img src="{{ asset($portfolio->image_url) }}" class="portfolio-img" alt="{{ $portfolio->title }}" loading="lazy">
                                <div class="portfolio-overlay">
                                    <h3 class="portfolio-title">{{ $portfolio->title }}</h3>
                                    <p class="portfolio-category">{{ $portfolio->category ?? 'Web Development' }}</p>
                                    <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn btn-outline-modern">Lihat Detail</a>
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-12 text-center" data-animate="slideUp">
                        <div class="alert alert-light border-0 shadow-sm">
                            <p class="mb-0 text-muted">Tidak ada portfolio tersedia saat ini.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5" data-animate="slideUp">
                <a href="{{ route('portfolio') }}" class="btn btn-primary-modern">Lihat Semua Portfolio</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-heading" data-animate="slideUp">
                <h2>Apa Kata Klien Kami</h2>
                <p>Testimoni dari klien yang telah menggunakan layanan kami</p>
            </div>
            
            <div class="swiper testimonial-slider" data-animate="fadeIn">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                "Firstudio telah membantu kami mengembangkan website perusahaan dengan hasil yang luar biasa. Tim mereka sangat profesional dan responsif."
                            </div>
                            <div class="testimonial-author">
                                <img src="{{ asset('aivo/assets/img/testimonials/testi-1.jpg') }}" alt="Client" class="author-avatar">
                                <div class="author-info">
                                    <h5>Budi Santoso</h5>
                                    <p>Direktur, PT Abadi Jaya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                "Pelayanan ibadah haji dari Firstudio sangat memuaskan. Semua proses berjalan lancar dan kami mendapat bimbingan spiritual yang baik."
                            </div>
                            <div class="testimonial-author">
                                <img src="{{ asset('aivo/assets/img/testimonials/testi-2.jpg') }}" alt="Client" class="author-avatar">
                                <div class="author-info">
                                    <h5>Siti Aminah</h5>
                                    <p>Ibu Rumah Tangga</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                "Aplikasi mobile yang dikembangkan Firstudio membantu bisnis kami meningkat pesat. User experience-nya sangat baik dan mudah digunakan."
                            </div>
                            <div class="testimonial-author">
                                <img src="{{ asset('aivo/assets/img/testimonials/testi-3.jpg') }}" alt="Client" class="author-avatar">
                                <div class="author-info">
                                    <h5>Andi Wijaya</h5>
                                    <p>CEO, TokoAndi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content" data-animate="slideUp">
                <h2 class="cta-title">Siap Memulai Proyek Anda?</h2>
                <p class="mb-5" style="font-size:1.2rem;">Kami siap membantu mewujudkan ide dan kebutuhan digital Anda dengan solusi terbaik.</p>
                <a href="#contact" class="btn btn-primary-modern btn-lg">Hubungi Kami Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-animate="slideUp">
                    <div class="footer-about">
                        <a href="#" class="footer-logo">Firstudio</a>
                        <p>Perusahaan penyedia solusi digital dan layanan ibadah profesional dengan pengalaman lebih dari 10 tahun.</p>
                        <div class="social-links">
                            <a href="#"><i class="lni lni-facebook"></i></a>
                            <a href="#"><i class="lni lni-instagram"></i></a>
                            <a href="#"><i class="lni lni-linkedin"></i></a>
                            <a href="#"><i class="lni lni-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0" data-animate="slideUp" data-animate-delay="100">
                    <div class="footer-links">
                        <h5>Layanan</h5>
                        <ul>
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Mobile Apps</a></li>
                            <li><a href="#">Digital Marketing</a></li>
                            <li><a href="#">SEO</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0" data-animate="slideUp" data-animate-delay="200">
                    <div class="footer-links">
                        <h5>Perusahaan</h5>
                        <ul>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Tim Kami</a></li>
                            <li><a href="#">Portfolio</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Karir</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4" data-animate="slideUp" data-animate-delay="300">
                    <div class="footer-links">
                        <h5>Kontak Kami</h5>
                        <ul>
                            <li><i class="lni lni-map-marker mr-2"></i> Jl. Sudirman No. 123, Jakarta</li>
                            <li><i class="lni lni-phone mr-2"></i> +62 123 4567 890</li>
                            <li><i class="lni lni-envelope mr-2"></i> info@firstudio.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright" data-animate="fadeIn">
                <p>&copy; 2023 Firstudio. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
@endsection

@section('scripts')
<!-- Include additional JS libraries -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize loading animation
        const loadingOverlay = document.getElementById('loadingOverlay');
        
        // Initialize particles.js
        if (document.getElementById('particles-js')) {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 80, density: { enable: true, value_area: 800 } },
                    color: { value: "#6B7280" },
                    shape: { type: "circle" },
                    opacity: { value: 0.5, random: true },
                    size: { value: 3, random: true },
                    line_linked: { enable: true, distance: 150, color: "#9CA3AF", opacity: 0.4, width: 1 },
                    move: { enable: true, speed: 2, direction: "none", random: true, straight: false, out_mode: "out" }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: {
                        onhover: { enable: true, mode: "repulse" },
                        onclick: { enable: true, mode: "push" }
                    }
                }
            });
        }

        // Hide loading overlay
        setTimeout(() => {
            loadingOverlay.classList.add('hidden');
            setTimeout(() => {
                loadingOverlay.style.display = 'none';
            }, 500);
        }, 1500);

        // Typing effect
        const typingText = document.getElementById('typing-text');
        const texts = [
            "Solusi Digital Kreatif",
            "Layanan Haji & Umroh",
            "Pengembangan Web & App",
            "Paket Qurban Terbaik"
        ];
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typingSpeed = 100;

        function type() {
            const currentText = texts[textIndex];
            
            if (isDeleting) {
                typingText.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
                typingSpeed = 50;
            } else {
                typingText.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
                typingSpeed = 100;
            }

            if (!isDeleting && charIndex === currentText.length) {
                isDeleting = true;
                typingSpeed = 1500; // Pause at end
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
                typingSpeed = 500; // Pause before typing next
            }

            setTimeout(type, typingSpeed);
        }

        // Start typing effect after loading
        setTimeout(type, 1800);

        // Initialize Swiper for testimonials
        const testimonialSwiper = new Swiper('.testimonial-slider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
            spaceBetween: 30,
        });

        // Animate counter numbers
        const counters = document.querySelectorAll('.counter');
        const speed = 200;
        
        function animateCounters() {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-count');
                const count = +counter.innerText;
                const increment = target / speed;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(animateCounters, 1);
                } else {
                    counter.innerText = target;
                }
            });
        }

        // Start counter animation when scrolled to
        const statsSection = document.querySelector('.stats-section');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        if (statsSection) {
            observer.observe(statsSection);
        }

        // Scroll progress bar
        const scrollProgress = document.getElementById('scrollProgress');
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            scrollProgress.style.width = Math.min(scrollPercent, 100) + '%';
        });

        // Smooth scrolling with offset
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                
                if (target) {
                    const offset = 80;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    } else {
                        window.location.hash = targetId;
                    }
                }
            });
        });

        // Scroll reveal animation
        const animateElements = document.querySelectorAll('[data-animate]');
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const animationType = entry.target.getAttribute('data-animate');
                    entry.target.style.animationName = animationType;
                    entry.target.style.opacity = 1;
                    scrollObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animateElements.forEach(el => {
            scrollObserver.observe(el);
        });

        // 3D tilt effect for service cards
        const serviceCards = document.querySelectorAll('.service-card');
        serviceCards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const xAxis = (window.innerWidth / 2 - e.pageX) / 15;
                const yAxis = (window.innerHeight / 2 - e.pageY) / 15;
                card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
            });

            card.addEventListener('mouseenter', () => {
                card.style.transition = 'none';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transition = 'all 0.5s ease';
                card.style.transform = 'rotateY(0deg) rotateX(0deg)';
            });
        });
    });

    // Re-run animations when navigating back/forward
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            document.querySelectorAll('[data-animate]').forEach(el => {
                el.style.animationName = 'none';
                setTimeout(() => {
                    el.style.animationName = el.getAttribute('data-animate');
                }, 10);
            });
        }
    });
</script>
@endsection