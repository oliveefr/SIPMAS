<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPMAS - Sistem Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        .btn-hover {
            transition: all 0.3s ease;
            transform: perspective(1px) translateZ(0);
        }
        .btn-hover:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .gradient-text {
            background: linear-gradient(90deg, #2563eb 0%, #059669 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="font-[Poppins] bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-10" src="https://img.icons8.com/color/48/000000/complaint.png" alt="Logo">
                        <span class="ml-2 text-xl font-bold text-gray-900">SIPMAS</span>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-8">
                    <a href="#" class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> Beranda </a>
                    <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> Tentang </a>
                    <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> Panduan </a>
                    <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> Kontak </a>
                    
                    @if(!auth()->check())
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover">Daftar</a>
                    @else
                    <div class="ml-4 relative flex items-center">
                        <div class="relative">
                            <button class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="hidden md:hidden bg-white shadow-lg" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Beranda</a>
                <a href="#" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Tentang</a>
                <a href="#" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Panduan</a>
                <a href="#" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Kontak</a>
            </div>
            @if(!auth()->check())
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="mt-3 space-y-1 px-2">
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Masuk</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700">Daftar</a>
                </div>
            </div>
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 lg:mt-16 lg:px-8 xl:mt-20">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl" data-aos="fade-right">
                            <span class="block">Sistem Pengaduan</span>
                            <span class="block gradient-text">Masyarakat Modern</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0" data-aos="fade-right" data-aos-delay="100">
                            Sampaikan keluhan dan masalah Anda dengan mudah. Kami siap membantu menyelesaikan masalah di lingkungan Anda.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start" data-aos="fade-up" data-aos-delay="200">
                            @if(!auth()->check())
                            <div class="rounded-md shadow">
                                <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 btn-hover">
                                    Buat Pengaduan
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 btn-hover">
                                    Masuk Sekarang
                                </a>
                            </div>
                            @else
                            <div class="rounded-md shadow">
                                <a href="{{ route('complaints.create') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 btn-hover">
                                    Buat Pengaduan Baru
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('dashboard') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 btn-hover">
                                    Dashboard Saya
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="People discussing">
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center" data-aos="fade-up">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Fitur Unggulan</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Layanan Terbaik Untuk Masyarakat
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Kami menyediakan berbagai fitur untuk memudahkan pengaduan masyarakat.
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <div class="relative bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
                        <div class="absolute -top-6 left-6 h-14 w-14 rounded-md bg-blue-600 flex items-center justify-center text-white">
                            <i class="fas fa-bolt text-2xl"></i>
                        </div>
                        <h3 class="mt-8 text-lg leading-6 font-medium text-gray-900">Proses Cepat</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Pengaduan Anda akan diproses dalam waktu maksimal 24 jam setelah diterima.
                        </p>
                    </div>

                    <div class="relative bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
                        <div class="absolute -top-6 left-6 h-14 w-14 rounded-md bg-green-600 flex items-center justify-center text-white">
                            <i class="fas fa-shield-alt text-2xl"></i>
                        </div>
                        <h3 class="mt-8 text-lg leading-6 font-medium text-gray-900">Data Terlindungi</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Identitas Anda akan kami jaga kerahasiaannya dengan sistem keamanan terbaik.
                        </p>
                    </div>

                    <div class="relative bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="300">
                        <div class="absolute -top-6 left-6 h-14 w-14 rounded-md bg-indigo-600 flex items-center justify-center text-white">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                        <h3 class="mt-8 text-lg leading-6 font-medium text-gray-900">Transparansi</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Anda bisa memantau perkembangan pengaduan secara real-time melalui dashboard.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-12" data-aos="fade-up">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Cara Kerja</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Bagaimana Melakukan Pengaduan?
                </p>
            </div>

            <div class="mt-10">
                <div class="relative">
                    <div class="absolute hidden md:block h-full border-r-2 border-blue-200 left-1/2"></div>
                    
                    <!-- Step 1 -->
                    <div class="flex flex-col md:flex-row mb-8" data-aos="fade-right">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-xl mx-auto md:mx-0">
                            1
                        </div>
                        <div class="md:ml-8 mt-4 md:mt-0 text-center md:text-left">
                            <h3 class="text-xl font-bold text-gray-900">Buat Akun</h3>
                            <p class="mt-2 text-gray-600">
                                Daftarkan diri Anda dengan mengisi formulir pendaftaran yang sederhana. Hanya membutuhkan beberapa menit saja.
                            </p>
                            <div class="mt-4">
                                <img src="https://images.unsplash.com/photo-1551269901-5c5e14c25df7?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Register" class="rounded-lg shadow-md h-48 w-full object-cover">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="flex flex-col md:flex-row mb-8" data-aos="fade-left" data-aos-delay="200">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-green-600 flex items-center justify-center text-white font-bold text-xl mx-auto md:mx-0 order-1 md:order-none">
                            2
                        </div>
                        <div class="md:mr-8 mt-4 md:mt-0 text-center md:text-right md:text-left">
                            <h3 class="text-xl font-bold text-gray-900">Isi Formulir Pengaduan</h3>
                            <p class="mt-2 text-gray-600">
                                Laporkan masalah dengan mengisi detail dan melampirkan bukti foto jika diperlukan. Deskripsikan dengan jelas.
                            </p>
                            <div class="mt-4">
                                <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Complaint Form" class="rounded-lg shadow-md h-48 w-full object-cover">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="flex flex-col md:flex-row" data-aos="fade-right" data-aos-delay="400">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-xl mx-auto md:mx-0">
                            3
                        </div>
                        <div class="md:ml-8 mt-4 md:mt-0 text-center md:text-left">
                            <h3 class="text-xl font-bold text-gray-900">Pantau Perkembangan</h3>
                            <p class="mt-2 text-gray-600">
                                Anda akan mendapatkan notifikasi saat ada perkembangan pada laporan Anda. Bisa dipantau melalui dashboard.
                            </p>
                            <div class="mt-4">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Tracking" class="rounded-lg shadow-md h-48 w-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="bg-blue-50 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-12" data-aos="fade-up">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Testimoni</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Apa Kata Pengguna Kami?
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Testimonial 1">
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-sm text-gray-500">Warga Kelurahan Menteng</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Sangat membantu! Laporan saya tentang jalan rusak sudah ditangani dalam 3 hari setelah melapor melalui SIPMAS. Sistemnya mudah digunakan dan transparan."
                    </p>
                    <div class="mt-4 flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg" alt="Testimonial 2">
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Budi Santoso</h4>
                            <p class="text-sm text-gray-500">Ketua RT 05 Kebayoran</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Sebagai ketua RT, SIPMAS sangat membantu dalam menyampaikan aspirasi warga ke pemerintah daerah. Responsnya cepat dan solutif."
                    </p>
                    <div class="mt-4 flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="bg-blue-600 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 text-center text-white">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="text-5xl font-bold mb-2" id="stat1">0</div>
                    <div class="text-xl">Pengaduan Diterima</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="text-5xl font-bold mb-2" id="stat2">0</div>
                    <div class="text-xl">Pengaduan Diselesaikan</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="text-5xl font-bold mb-2" id="stat3">0</div>
                    <div class="text-xl">Pengguna Terdaftar</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-r from-blue-500 to-green-500 rounded-xl p-8 shadow-xl" data-aos="zoom-in">
                <h2 class="text-3xl font-bold text-white mb-4">Siap Melakukan Pengaduan?</h2>
                <p class="text-xl text-blue-100 mb-6">
                    Bergabunglah dengan ribuan masyarakat lainnya yang telah menggunakan SIPMAS untuk menyampaikan aspirasi.
                </p>
                @if(!auth()->check())
                <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-blue-600 bg-white hover:bg-blue-50 btn-hover">
                    Daftar Sekarang
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                @else
                <a href="{{ route('complaints.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-blue-600 bg-white hover:bg-blue-50 btn-hover">
                    Buat Pengaduan Baru
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center">
                        <img class="h-8" src="https://img.icons8.com/color/48/000000/complaint.png" alt="Logo">
                        <span class="ml-2 text-xl font-bold">SIPMAS</span>
                    </div>
                    <p class="mt-4 text-gray-400">
                        Sistem Pengaduan Masyarakat modern untuk mewujudkan pelayanan publik yang lebih baik.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Panduan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Jl. Pelayanan Publik No. 123
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2"></i>
                            (021) 1234-5678
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            info@sipmas.example
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-400 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy; 2023 SIPMAS. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Button -->
    @if(auth()->check())
    <a href="{{ route('complaints.create') }}" class="fixed bottom-6 right-6 bg-blue-600 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition transform hover:scale-110 floating" data-aos="fade-up" data-aos-delay="500">
        <i class="fas fa-plus text-xl"></i>
    </a>
    @endif

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Counter animation for stats
        function animateValue(id, start, end, duration) {
            let obj = document.getElementById(id);
            let range = end - start;
            let minTimer = 50;
            let stepTime = Math.abs(Math.floor(duration / range));
            
            stepTime = Math.max(stepTime, minTimer);
            
            let startTime = new Date().getTime();
            let endTime = startTime + duration;
            let timer;
            
            function run() {
                let now = new Date().getTime();
                let remaining = Math.max((endTime - now) / duration, 0);
                let value = Math.round(end - (remaining * range));
                obj.innerHTML = value.toLocaleString();
                if (value == end) {
                    clearInterval(timer);
                }
            }
            
            timer = setInterval(run, stepTime);
            run();
        }

        // Start counters when stats section is in view
        const statsSection = document.querySelector('.bg-blue-600');
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                animateValue("stat1", 0, 1243, 2000);
                animateValue("stat2", 0, 982, 2000);
                animateValue("stat3", 0, 756, 2000);
                observer.unobserve(statsSection);
            }
        }, {threshold: 0.5});

        observer.observe(statsSection);

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>