
@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <h3>Daftar Pengaduan Anda</h3>
        <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">Buat Pengaduan Baru</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h4>Daftar Pengaduan</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduans as $p)
                    <tr>
                        <td>{{ $p->judul }}</td>
                        <td>{{ Str::limit($p->isi_laporan, 50) }}</td>
                        <td><span class="badge bg-info">{{ $p->status }}</span></td>
                        <td>{{ $p->created_at->format('d-m-Y') }}</td>
                        <td>
                            <form action="{{ route('pengaduan.destroy', $p->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <a href="{{ route('pengaduan.show', $p->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pengaduan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h4>Pengaduan yang Memerlukan Tanggapan</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduans as $p)
                    @if($p->status == 'proses') <!-- Hanya tampilkan pengaduan yang statusnya 'proses' -->
                        <tr>
                            <td>{{ $p->judul }}</td>
                            <td>{{ Str::limit($p->isi_laporan, 50) }}</td>
                            <td><span class="badge bg-warning">{{ $p->status }}</span></td>
                            <td>{{ $p->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('tanggapan.create', ['pengaduan_id' => $p->id]) }}"
                                    class="btn btn-sm btn-success">Beri Tanggapan</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection