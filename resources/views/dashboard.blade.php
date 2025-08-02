
@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin SIPMAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
      

        <!-- Stats Cards -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 -mt-10">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Pengaduan -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Pengaduan
                                </dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">
                                        1,248
                                    </div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">
                                            Increased by
                                        </span>
                                        12%
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengaduan Diproses -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Sedang Diproses
                                </dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">
                                        84
                                    </div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">
                                            Increased by
                                        </span>
                                        5%
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengaduan Selesai -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Telah Diselesaikan
                                </dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">
                                        1,112
                                    </div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">
                                            Increased by
                                        </span>
                                        8%
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Petugas Aktif -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Petugas Aktif
                                </dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">
                                        24
                                    </div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
                                        <svg class="self-center flex-shrink-0 h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">
                                            Decreased by
                                        </span>
                                        2%
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Recent Pengaduan -->
                <div class="lg:col-span-2">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900">Pengaduan Terbaru</h3>
                                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <!-- Sample Complaint 1 -->
                            <div class="px-6 py-4 hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex items-center justify-between">
                                            <h4 class="text-sm font-medium text-gray-900">Jalan Rusak di Perumahan Griya Asri</h4>
                                            <span class="text-xs text-gray-500">2 jam yang lalu</span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-600 truncate">Jalan utama di perumahan Griya Asri sudah rusak parah dan membahayakan pengendara...</p>
                                        <div class="mt-2 flex items-center text-xs text-gray-500">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Proses
                                            </span>
                                            <span class="ml-2">Oleh: Budi Santoso</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sample Complaint 2 -->
                            <div class="px-6 py-4 hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex items-center justify-between">
                                            <h4 class="text-sm font-medium text-gray-900">Lampu Jalan Mati</h4>
                                            <span class="text-xs text-gray-500">1 hari yang lalu</span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-600 truncate">Lampu jalan di Jl. Merdeka No. 45-50 sudah mati selama 3 hari, sangat gelap dan berbahaya...</p>
                                        <div class="mt-2 flex items-center text-xs text-gray-500">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Selesai
                                            </span>
                                            <span class="ml-2">Oleh: Ani Wijaya</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sample Complaint 3 -->
                            <div class="px-6 py-4 hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex items-center justify-between">
                                            <h4 class="text-sm font-medium text-gray-900">Sampah Menumpuk</h4>
                                            <span class="text-xs text-gray-500">3 hari yang lalu</span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-600 truncate">Sampah di RT 05/RW 03 sudah tidak diangkut selama 1 minggu dan mulai menimbulkan bau tidak sedap...</p>
                                        <div class="mt-2 flex items-center text-xs text-gray-500">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Belum Diproses
                                            </span>
                                            <span class="ml-2">Oleh: Citra Dewi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Activity -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Aksi Cepat</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-4">
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors">
                                    <svg class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span class="text-sm font-medium">Buat Pengaduan</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors">
                                    <svg class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    <span class="text-sm font-medium">Beri Tanggapan</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-lg bg-purple-50 text-purple-600 hover:bg-purple-100 transition-colors">
                                    <svg class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <span class="text-sm font-medium">Kelola Pengguna</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-lg bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition-colors">
                                    <svg class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-medium">Cetak Laporan</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Aktivitas Terkini</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <!-- Activity 1 -->
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Petugas+A&background=random" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Petugas A</div>
                                        <div class="text-sm text-gray-500">Menanggapi pengaduan tentang jalan rusak</div>
                                        <div class="mt-1 text-xs text-gray-500">30 menit yang lalu</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Activity 2 -->
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Admin&background=random" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Admin</div>
                                        <div class="text-sm text-gray-500">Menambahkan petugas baru</div>
                                        <div class="mt-1 text-xs text-gray-500">2 jam yang lalu</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Activity 3 -->
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Petugas+B&background=random" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Petugas B</div>
                                        <div class="text-sm text-gray-500">Menyelesaikan pengaduan lampu jalan mati</div>
                                        <div class="mt-1 text-xs text-gray-500">1 hari yang lalu</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection