 @extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Beranda SIPMAS') }}
    </h2>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-6 mt-12">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row">

        <!-- Sisi Kiri: Branding / Ilustrasi -->
        <div class="lg:w-1/2 bg-gradient-to-br from-green-600 to-green-800 text-white flex items-center justify-center p-10">
            <div class="text-center space-y-4">
                <img src="{{ asset('images/JMP-AMBON.gif') }}" alt="Ilustrasi SIPMAS" class="w-48 mx-auto rounded-xl shadow-md">
                <h3 class="text-4xl font-bold tracking-wide">SIPMAS</h3>
                <p class="text-sm text-green-100">Sistem Informasi Pengaduan Masyarakat</p>
            </div>
        </div>

        <!-- Sisi Kanan: Konten Informasi -->
        <div class="lg:w-1/2 p-10 space-y-6 bg-gray-50">
            <h1 class="text-3xl font-bold text-gray-800">Selamat Datang di SIPMAS</h1>
            <p class="text-gray-600 leading-relaxed">
                SIPMAS adalah platform digital yang memudahkan masyarakat menyampaikan pengaduan, kritik, dan saran kepada instansi terkait secara cepat dan transparan.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fitur -->
                <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition">
                    <h4 class="text-green-700 font-semibold text-lg mb-2">Fitur Unggulan</h4>
                    <ul class="text-sm text-gray-700 list-disc list-inside space-y-1">
                        <li>Kirim pengaduan online</li>
                        <li>Unggah bukti berupa gambar</li>
                        <li>Lihat riwayat & status</li>
                        <li>Respons cepat dari admin</li>
                    </ul>
                </div>

                <!-- Panduan -->
                <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition">
                    <h4 class="text-green-700 font-semibold text-lg mb-2">Panduan Singkat</h4>
                    <ol class="text-sm text-gray-700 list-decimal list-inside space-y-1">
                        <li>Login ke akun Anda</li>
                        <li>Buka menu <strong>Pengaduan</strong></li>
                        <li>Isi form & unggah bukti</li>
                        <li>Lacak status pengaduan</li>
                    </ol>
                </div>
            </div>

            <div class="text-center pt-6">
                <a href="{{ route('pengaduan.index') }}"
                   class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-200 shadow-md">
                    Buat Pengaduan Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Spacer agar tidak menempel ke footer -->
<div class="h-16"></div>
@endsection
