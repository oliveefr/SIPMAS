@extends('layouts.app') <!-- pakai layout default breeze -->

@section('content')
<div class="max-w-2xl mx-auto mt-4 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-green-700">Form Kirim Pengaduan</h1>

    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- judul -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Judul Pengaduan</label>
            <input type="text" name="judul" class="w-full border rounded p-2" required>
        </div>

        <!-- isi pengaduan -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Isi Pengaduan</label>
            <textarea name="isi" class="w-full border rounded p-2" rows="5" required></textarea>
        </div>

        <!-- gambar ket. bukti -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Upload Bukti (Opsional)</label>
            <input type="file" name="bukti" class="w-full border rounded p-2">
        </div>

        <!-- button kirim -->
        <div class="text-right">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Kirim Pengaduan</button>
        </div>
    </form>
</div>
@endsection
