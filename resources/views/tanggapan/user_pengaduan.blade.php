@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pengaduan</h3>
    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">Buat Pengaduan Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>Pengaduan dari Pengguna</h4>
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
                        <a href="{{ route('tanggapan.create', ['pengaduan_id' => $p->id]) }}" class="btn btn-sm btn-success">Beri Tanggapan</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada pengaduan dari pengguna ini.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection