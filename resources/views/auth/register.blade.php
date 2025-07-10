<!DOCTYPE html>
<html lang="id" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('sneat-1.0.0/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register - Firstudio Company App</title>

    <meta name="description" content="Sistem Manajemen Firstudio - Software House" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/Firstudio.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Custom CSS for improvisasi -->
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .register-card {
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            border-radius: 18px;
            background: rgba(255,255,255,0.97);
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .app-brand-logo {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }
        .tagline {
            font-size: 1.1rem;
            color: #6a11cb;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .input-group-text {
            background: #f3f3f3;
        }
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106,17,203,.15);
        }
        .btn-primary {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
        }
        .footer {
            margin-top: 40px;
            color: #fff;
            text-align: center;
            font-size: 0.95rem;
        }
        @media (max-width: 576px) {
            .register-card { padding: 1.5rem 0.5rem; }
        }
    </style>
    <!-- Helpers -->
    <script src="{{ asset('sneat-1.0.0/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('sneat-1.0.0/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="container-xxl d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="authentication-wrapper authentication-basic container-p-y w-100" style="max-width: 450px;">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card register-card">
                    <div class="card-body">
                        <!-- Logo & Tagline -->
                        <div class="text-center mb-3">
                            <img src="{{ asset('logo/Firstudio.png') }}" alt="Firstudio Logo" class="app-brand-logo rounded-circle shadow-sm">
                            <div class="tagline">Empowering Your Digital Transformation</div>
                        </div>
                        <h4 class="mb-2 text-center">Daftar Akun Baru di Firstudio 🚀</h4>
                        <p class="mb-4 text-center">Lengkapi data Anda untuk bergabung bersama ekosistem digital Firstudio.</p>
                        @if (session('error'))
                            <div class="alert alert-danger mb-3">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukkan nama lengkap Anda"
                                        value="{{ old('name') }}" autofocus />
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Masukkan email Anda"
                                        value="{{ old('email') }}" />
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" placeholder="Masukkan nomor telepon Anda"
                                        value="{{ old('phone') }}" />
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-map"></i></span>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                        placeholder="Masukkan alamat lengkap Anda">{{ old('address') }}</textarea>
                                </div>
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password Anda" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation"
                                        placeholder="Konfirmasi password Anda" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" required />
                                    <label class="form-check-label" for="terms-conditions">
                                        Saya menyetujui
                                        <a href="javascript:void(0);">kebijakan privasi & ketentuan</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">Daftar</button>
                        </form>
                        <p class="text-center">
                            <span>Sudah punya akun?</span>
                            <a href="{{ route('login') }}">
                                <span>Login di sini</span>
                            </a>
                        </p>
                        <div class="text-center mt-3">
                            <a href="{{ route('home') }}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Register Card -->
            </div>
        </div>
        <div class="footer mt-4">
            &copy; {{ date('Y') }} Firstudio. All rights reserved. | <a href="https://firstudio.id" style="color:#fff;text-decoration:underline;">firstudio.id</a>
        </div>
    </div>
    <!-- Core JS -->
    <script src="{{ asset('sneat-1.0.0/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('sneat-1.0.0/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('sneat-1.0.0/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('sneat-1.0.0/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('sneat-1.0.0/assets/js/main.js') }}"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
</body>

</html>
