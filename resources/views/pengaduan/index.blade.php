@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Daftar Pengaduan') }}
    </h2>
@endsection

@section('content')

    <!-- Form Pengaduan -->
    <div class="max-w-2xl mx-auto mt-4 mb-12 bg-white p-6 rounded-lg shadow-md">

        <h1 class="text-2xl font-bold mb-6 text-green-700">Sampaikan Masukan Anda</h1>

        <!-- Pesan sukses -->
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validasi error -->
        @if($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form pengaduan -->
        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Judul Pengaduan</label>
                <input type="text" name="judul" class="w-full border rounded p-2" required>
            </div>

            <!-- Isi -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Isi Pengaduan</label>
                <textarea name="isi" class="w-full border rounded p-2" rows="5" required></textarea>
            </div>

            <!-- Bukti -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Upload Bukti (Opsional)</label>
                <input type="file" name="bukti" class="w-full border rounded p-2">
            </div>

            <!-- Tombol Kirim -->
            <div class="text-right">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Kirim Pengaduan
                </button>
            </div>
        </form>
    </div>

    <!-- Riwayat Pengaduan -->
    <div class="max-w-2xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Riwayat Pengaduan Anda</h2>

        @forelse($pengaduanList as $pengaduan)
            <div class="mb-4 p-4 border rounded bg-gray-50">
                <p class="font-bold text-green-800">{{ $pengaduan->judul }}</p>
                <p class="text-sm text-gray-600">{{ $pengaduan->created_at->format('d M Y') }}</p>
                <p class="text-gray-700 mt-2">{{ $pengaduan->isi }}</p>

            <!-- Gambar bukti -->
@if($pengaduan->bukti)
<div class="mt-3">
    <p class="text-sm text-gray-600 mb-1">Bukti Foto:</p>
    <a href="{{ asset('storage/' . $pengaduan->bukti) }}" target="_blank">
        <img src="{{ asset('storage/' . $pengaduan->bukti) }}"
                alt="Bukti Pengaduan"
                class="w-12 h-12 object-cover rounded-full border hover:scale-105 transition-transform duration-200">
    </a>
</div>
@endif

                <p class="text-sm mt-3">
                    Status: <span class="text-indigo-600">{{ ucfirst($pengaduan->status) }}</span>
                </p>
            </div>
        @empty
            <p class="text-gray-500">Belum ada pengaduan.</p>
        @endforelse
    </div>

@endsection
