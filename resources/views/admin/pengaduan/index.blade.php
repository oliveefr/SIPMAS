@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Data Pengaduan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-auto w-full"> {{-- 👈 Tambahkan ini --}}
                    <table class="table-auto w-full border-collapse border border-gray-300 min-w-[800px]">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Judul</th>
                                <th class="border px-4 py-2">Isi Laporan</th>
                                <th class="border px-4 py-2">Foto</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $no => $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $no + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $item->user->name ?? '-' }}</td>
                                    <td class="border px-4 py-2">{{ $item->judul }}</td>
                                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($item->isi_laporan, 50) }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="foto" width="70">
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        <span class="px-2 py-1 rounded text-white text-sm 
                                            @if ($item->status == 'pending') bg-yellow-500
                                            @elseif($item->status == 'proses') bg-blue-500
                                            @else bg-green-500 @endif">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td class="border px-4 py-2 flex gap-2">
                                        <a href="{{ route('pengaduan_admin.show', $item->id) }}"
                                            class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                            Detail
                                        </a>
                                        <form action="{{ route('pengaduan_admin.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($pengaduans->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center border py-4">Belum ada data pengaduan.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div> {{-- 👈 Penutup div overflow --}}
            </div>
        </div>
    </div>
@endsection
