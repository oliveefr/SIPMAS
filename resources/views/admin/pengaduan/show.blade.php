@extends('partials.dashboard')

@section('title', 'Detail Pengaduan')

@section('sidebar')
    @include('layouts.sidebar')
@endsection
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
    
    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center mb-6">
            <a href="{{ route('pengaduan_admin.index') }}" class="flex items-center text-blue-600 hover:text-blue-800 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ml-1">Kembali</span>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Detail Pengaduan</h1>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-white">{{ $pengaduan->judul }}</h2>
                    <span
                        class="px-3 py-1 rounded-full text-xs font-medium 
                    {{ $pengaduan->status === 'selesai'
                        ? 'bg-green-100 text-green-800'
                        : ($pengaduan->status === 'proses'
                            ? 'bg-yellow-100 text-yellow-800'
                            : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-6">
                <!-- User Info -->
                <div class="flex items-center mb-6">
                    <div class="bg-blue-100 text-blue-800 rounded-full p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $pengaduan->user->name }}</h3>
                        <p class="text-sm text-gray-600">Pelapor</p>
                    </div>
                </div>

                <!-- Complaint Details -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Isi Laporan</h3>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-gray-700">{{ $pengaduan->isi_laporan }}</p>
                    </div>
                </div>

                <!-- Photo Evidence -->
                @if ($pengaduan->foto)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Bukti Foto</h3>
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan"
                                class="rounded-lg shadow-md w-full max-w-md cursor-pointer transition duration-300 transform group-hover:scale-105">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition duration-300 rounded-lg">
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Tanggapan Section -->
                @if ($pengaduan->tanggapan)
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="bg-green-100 text-green-800 rounded-full p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Tanggapan Resmi</h3>
                                <p class="text-sm text-gray-500">
                                    {{ $pengaduan->tanggapan->tanggal_tanggapan->format('d F Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                            <p class="text-gray-700">{{ $pengaduan->tanggapan->isi_tanggapan }}</p>
                        </div>
                    </div>
                @else
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-center py-8 bg-gray-50 rounded-lg">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-gray-700">Belum ada tanggapan</h3>
                                <p class="mt-1 text-gray-500">Pengaduan ini belum mendapatkan tanggapan dari petugas.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Footer Section -->
            <div class="bg-gray-50 px-6 py-4 flex justify-end">
                <div class="flex space-x-3">
                    <a href="{{ route('pengaduan_admin.index') }}"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Kembali ke Daftar
                    </a>
                    @if (!$pengaduan->tanggapan)
                        <button onclick="document.getElementById('modalTanggapan').classList.remove('hidden')"
                            class="bg-green-600 text-white px-4 py-2 rounded mt-4">
                            Beri Tanggapan
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <!-- Modal Tanggapan -->
        <div id="modalTanggapan" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h2 class="text-xl font-bold mb-4">Beri Tanggapan</h2>
                <form action="{{ route('tanggapan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">

                    <div class="mb-4">
                        <label for="isi_tanggapan" class="block font-semibold">Isi Tanggapan</label>
                        <textarea name="isi_tanggapan" id="isi_tanggapan" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="document.getElementById('modalTanggapan').classList.add('hidden')"
                            class="px-4 py-2 bg-gray-500 text-white rounded">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Kirim</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
