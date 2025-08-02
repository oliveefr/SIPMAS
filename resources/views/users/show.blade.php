
@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <h3 class="mb-4">Detail Masyarakat</h3>

        <div class="card mb-4">
            <div class="card-header bg-dark text-white">Informasi Pengguna</div>
            <div class="card-body">
                <p><strong>NIK:</strong> {{ $user->nik }}</p>
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>No. Hp:</strong> {{ $user->no_hp }}</p>
                <p><strong>Terdaftar Sejak:</strong> {{ $user->created_at->format('d-m-Y') }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">Daftar Pengaduan</div>
            <div class="card-body p-0">
                @if($user->pengaduan->count() > 0)
                    <table class="table table-bordered table-striped m-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th> {{-- Kolom baru untuk foto --}}
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->pengaduan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $item->isi_laporan }}</td>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Pengaduan" style="max-width: 100px; max-height: 70px; border-radius: 4px;">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 'pending' || $item->status == '0')
                                            <span class="badge bg-secondary">Belum diproses</span>
                                        @elseif($item->status == 'proses')
                                            <span class="badge bg-warning text-dark">Diproses</span>
                                        @elseif($item->status == 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pengaduan.cetak.individual', $item->id) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            Cetak
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-3">
                        <p class="text-muted mb-0">Belum ada pengaduan dari masyarakat ini.</p>
                    </div>
                @endif
            </div>
        </div>

        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-4">← Kembali ke Data Masyarakat</a>
    </div>
@endsection
