<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIPMAS - Sistem Pengaduan Masyarakat</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
    <header id="header" class="header sticky-top">
        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="d-none d-md-flex align-items-center">
                    <i class="bi bi-clock me-1"></i>
                    <span id="current-time"></span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-phone me-1"></i> Hubungi Kami +62 821-3462-6573
                </div>
            </div>
        </div>

        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-end">
                <a href="#" class="logo d-flex align-items-center me-auto ">
                    <img src="{{ asset('assets/img/logo/logo-SIPMAS.png') }}" alt="">
                </a>

                @if (Route::has('login'))
                    <nav id="navmenu" class="menu">
                        @auth
                            <a href="{{ route('pengaduan.index') }}" class="cta-btn nav-button rounded-pill">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="cta-btn nav-button rounded-pill">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="cta-btn nav-button-right rounded-pill">
                                    Register
                                </a>
                            @endif
                        @endauth
                        <i class="mobile-nav-toggle d-xl-none bi bi-list text-white"></i>
                    </nav>



                @endif
            </div>
        </div>
    </header>

    <main class="main">
        <section id="hero" class="hero section">
            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">

                <!-- 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/carousel/pengaduan-01.jpg') }}" alt="">
                    <div class="container">
                        <h2>Selamat Datang di <strong class="text-navy">SIPMAS</strong></h2>
                        <p>Platform resmi pengaduan masyarakat untuk menyampaikan keluhan, saran, dan aspirasi terhadap
                            layanan publik secara mudah dan cepat.</p>
                    </div>
                </div>

                <!-- 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/carousel/pengaduan-02.jpg') }}" alt="">
                    <div class="container">
                        <h2>Layanan Pengaduan Terintegrasi</h2>
                        <p>Sampaikan pengaduan Anda kapan saja, di mana saja. Kami siap menindaklanjuti laporan
                            masyarakat demi pelayanan yang lebih baik.</p>
                    </div>
                </div>

                <!-- 3 -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/carousel/pengaduan-03.jpg') }}" alt="">
                    <div class="container">
                        <h2>Transparan dan Responsif</h2>
                        <p>Setiap pengaduan akan kami proses secara adil dan transparan. Mari bersama-sama wujudkan
                            pemerintahan yang terbuka dan bertanggung jawab.</p>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>
                <ol class="carousel-indicators"></ol>
            </div>
        </section>

        <section id="call-to-action" class="call-to-action section accent-background">
            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Butuh Bantuan atau Ingin Menyampaikan Pengaduan?</h3>
                            <p>SIPMAS hadir untuk mempermudah masyarakat dalam menyampaikan keluhan, laporan, atau
                                aspirasi terkait pelayanan publik. Tim kami siap menindaklanjuti setiap laporan dengan
                                cepat dan tanggap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer light-background">
        <footer id="footer" class="footer light-background">

            <div class="container footer-top">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">SIPMAS</span>
                        </a>
                        <div class="footer-contact pt-3">
                            <p>Jl. Pelayanan Publik No. 123</p>
                            <p>Kota Ambon, Maluku 97123</p>
                            <p class="mt-3"><strong>Telepon:</strong> <span>+62 812 3456 7890</span></p>
                            <p><strong>Email:</strong> <span>sipmas@layanan.go.id</span></p>
                        </div>
                        <div class="social-links d-flex mt-4">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Menu Utama</h4>
                        <ul>
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#about">Tentang Kami</a></li>
                            <li><a href="#pengaduan">Form Pengaduan</a></li>
                            <li><a href="#">Kebijakan Privasi</a></li>
                            <li><a href="#">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Layanan</h4>
                        <ul>
                            <li><a href="#">Pengaduan Masyarakat</a></li>
                            <li><a href="#">Tindak Lanjut Laporan</a></li>
                            <li><a href="#">Informasi Publik</a></li>
                            <li><a href="#">Statistik Pengaduan</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Bantuan</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Hubungi Kami</a></li>
                            <li><a href="#">Panduan Pengguna</a></li>
                            <li><a href="#">Download Panduan</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Link Terkait</h4>
                        <ul>
                            <li><a href="#">Kementerian Dalam Negeri</a></li>
                            <li><a href="#">Ombudsman RI</a></li>
                            <li><a href="#">Kominfo</a></li>
                            <li><a href="#">Lapor.go.id</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">SIPMAS</strong> <span>All Rights
                        Reserved</span></p>
                <div class="credits">
                    Dibuat oleh Kelompok 3 | Sistem Pengaduan Masyarakat
                </div>
            </div>

        </footer>


        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script>
            function updateTime() {
                const waktu = new Date();
                const options = {
                    weekday: 'long',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false,
                    timeZone: 'Asia/Jakarta'
                };
                document.getElementById('current-time').textContent = waktu.toLocaleString('id-ID', options);
            }

            updateTime();
            setInterval(updateTime, 1000);
        </script>

</body>

</html>
