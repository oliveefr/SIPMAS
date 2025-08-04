@extends('partials.dashboard')

@section('title', 'Detail Pengaduan')

@section('sidebar')
    @include('layouts.sidebar')
@endsection
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
    <div class="container mx-auto px-3 py-2">
        <div class="flex items-center mb-2">
            <h1 class="text-lg font-bold text-gray-800">Detail Pengaduan</h1>
        </div>

        <div class="bg-white rounded shadow overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-3 py-2">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-white text-sm">{{ Str::limit($pengaduan->judul, 40) }}</h2>
                    <span
                        class="px-1.5 py-0.5 rounded-full text-xs font-medium 
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
            <div class="p-3">
                <!-- User Info -->
                <div class="flex items-center mb-2">
                    <div class="bg-blue-100 text-blue-800 rounded-full p-1.5 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-800 text-sm">{{ $pengaduan->user->name }}</h3>
                        <p class="text-xs text-gray-600">Pelapor</p>
                    </div>
                </div>

                <!-- Complaint Details -->
                <div class="mb-3">
                    <h3 class="font-medium text-gray-800 text-sm mb-1">Isi Laporan</h3>
                    <div class="bg-gray-50 p-2 rounded border border-gray-200 text-xs max-h-20 overflow-y-auto">
                        <p class="text-gray-700">{{ $pengaduan->isi_laporan }}</p>
                    </div>
                </div>

                <!-- Photo Evidence -->
                @if ($pengaduan->foto)
                    <div class="mb-3">
                        <h3 class="font-medium text-gray-800 text-sm mb-1">Bukti Foto</h3>
                        <div class="relative">
                            <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan"
                                class="rounded shadow w-32 h-32 object-cover cursor-pointer">
                        </div>
                    </div>
                @endif

                <!-- Tanggapan Section -->
                @if ($pengaduan->tanggapan)
                    <div class="mt-3 pt-3 border-t border-gray-200">
                        <div class="flex items-start mb-1">
                            <div class="bg-green-100 text-green-800 rounded-full p-1.5 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800 text-sm">Tanggapan Resmi</h3>
                                <p class="text-xs text-gray-500">
                                    {{ $pengaduan->tanggapan->tanggal_tanggapan->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="bg-green-50 border-l-4 border-green-500 p-2 rounded-r text-xs max-h-20 overflow-y-auto">
                            <p class="text-gray-700">{{ $pengaduan->tanggapan->isi_tanggapan }}</p>
                        </div>
                    </div>
                @else
                    <div class="mt-3 pt-3 border-t border-gray-200">
                        <div class="flex items-center justify-center py-2 bg-gray-50 rounded text-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                <h3 class="mt-1 text-xs font-medium text-gray-700">Belum ada tanggapan</h3>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

           
            <!-- Footer Section -->
            <div class="bg-gray-50 px-3 py-2 flex justify-between items-center">
                <a href="{{ route('pengaduan_admin.index') }}"
                    class="px-2 py-1 border border-gray-300 rounded text-xs text-gray-700 bg-white hover:bg-gray-50">
                    Kembali
                </a>

                <div class="flex items-center space-x-2">
                    {{-- Form Ubah Status --}}
                    <form action="{{ route('pengaduan.updateStatus', $pengaduan->id) }}" method="POST"
                        class="flex items-center space-x-2">
                        @csrf
                        @method('PATCH')

                        <select name="status"
                            class="border border-gray-300 rounded text-xs px-2 py-1 focus:ring focus:ring-blue-200">
                            <option value="pending" {{ $pengaduan->status === 'pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="proses" {{ $pengaduan->status === 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $pengaduan->status === 'selesai' ? 'selected' : '' }}>Selesai
                            </option>
                        </select>

                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded text-xs">
                            Simpan
                        </button>
                    </form>

                    {{-- Tombol Tanggapi --}}
                    @if (!$pengaduan->tanggapan)
                        <button onclick="document.getElementById('modalTanggapan').classList.remove('hidden')"
                            class="bg-green-600 text-white px-2 py-1 rounded text-xs">
                            Tanggapi
                        </button>
                    @endif
                </div>
            </div>

        </div>

        <!-- Modal Tanggapan -->
        <div id="modalTanggapan" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded shadow p-3 w-full max-w-xs">
                <h2 class="font-bold text-sm mb-2">Beri Tanggapan</h2>
                <form action="{{ route('tanggapan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">

                    <div class="mb-2">
                        <textarea name="isi_tanggapan" id="isi_tanggapan" rows="3" class="w-full border rounded px-2 py-1 text-xs"
                            required placeholder="Isi tanggapan..."></textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="document.getElementById('modalTanggapan').classList.add('hidden')"
                            class="px-2 py-1 bg-gray-500 text-white rounded text-xs">Batal</button>
                        <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded text-xs">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
