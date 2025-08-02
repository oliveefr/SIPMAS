@extends('layouts.app_user')

@section('content')
    <div class="container">
        <h3>Detail Pengaduan</h3>

        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $pengaduan->judul }}</h5>
                <p>{{ $pengaduan->isi_laporan }}</p>

                @if ($pengaduan->foto)
                    <p><strong>Foto:</strong></p>
                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan"
                        style="max-width: 100%; height: auto; border-radius: 5px; margin-bottom: 15px;">
                @else
                    <p><em>Tidak ada foto untuk pengaduan ini.</em></p>
                @endif

                <p><strong>Status:</strong> <span class="badge bg-info">{{ $pengaduan->status }}</span></p>
                <p><strong>Tanggal:</strong> {{ $pengaduan->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>

        {{-- Tampilkan Tanggapan Jika Ada --}}
        @if ($pengaduan->tanggapan)
            <div class="card border-success mb-3" style="background-color: #f0fff4;">
                <div class="card-header bg-success text-white">
                    Tanggapan Petugas
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <div class="bg-success text-white p-3 rounded" style="max-width: 500px;">
                                <strong>Tanggapan:</strong> <br>
                                {{ $pengaduan->tanggapan->isi_tanggapan }}
                            </div>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">
                        Diberikan pada: {{ $pengaduan->tanggapan->tanggal_tanggapan->format('d-m-Y') }} oleh
                        {{ $pengaduan->tanggapan->user->name ?? 'Petugas' }}
                    </small>
                </div>
            </div>
        @endif

        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection