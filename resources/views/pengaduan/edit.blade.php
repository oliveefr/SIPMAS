@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Edit Pengaduan</h2>

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" value="{{ $pengaduan->judul }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea name="isi" class="w-full border rounded p-2" rows="5" required>{{ $pengaduan->isi }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Upload Bukti Baru (Opsional)</label>
            <input type="file" name="bukti" class="w-full border rounded p-2">
            @if ($pengaduan->bukti)
                <p class="mt-2 text-sm text-gray-500">Bukti saat ini:</p>
                <img src="{{ asset('storage/' . $pengaduan->bukti) }}" alt="Bukti" class="w-32 mt-2 rounded shadow">
            @endif
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Perbarui</button>
        </div>
    </form>
</div>
@endsection
