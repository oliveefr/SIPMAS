@extends('layouts.app_user')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        {{-- Kolom Gambar --}}
        <div class="col-md-6 text-center mb-4 mb-md-0">
            @if ($pengaduan->foto)
                <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan"
                    class="img-fluid rounded-4 shadow-lg"
                    style="max-height: 450px; object-fit: cover; transition: transform 0.3s ease;"
                    onmouseover="this.style.transform='scale(1.03)';"
                    onmouseout="this.style.transform='scale(1)';">
            @else
                <p><em class="text-muted">Tidak ada foto untuk pengaduan ini.</em></p>
            @endif
        </div>

        {{-- Kolom Konten --}}
        <div class="col-md-6">
            <h3 class="fw-bold text-primary mb-3">📄 Detail Pengaduan</h3>

            <h5 class="fw-semibold text-dark">{{ $pengaduan->judul }}</h5>
            <p class="text-muted">{{ $pengaduan->isi_laporan }}</p>

            <div class="mb-3">
                <p class="mb-1"><strong>Status:</strong>
                    <span class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm">
                        {{ $pengaduan->status }}
                    </span>
                </p>
                <p><strong>Tanggal:</strong> {{ $pengaduan->created_at->format('d-m-Y H:i') }}</p>
            </div>

            {{-- Tanggapan Jika Ada --}}
            @if ($pengaduan->tanggapan)
                <div class="bg-light p-3 rounded-4 border shadow-sm">
                    <h6 class="text-success mb-2 fw-semibold">💬 Tanggapan Petugas</h6>
                    <p class="fst-italic mb-1">{{ $pengaduan->tanggapan->isi_tanggapan }}</p>
                    <small class="text-muted">
                        Diberikan pada: {{ $pengaduan->tanggapan->tanggal_tanggapan->format('d-m-Y') }}
                        oleh <strong>{{ $pengaduan->tanggapan->user->name ?? 'Petugas' }}</strong>
                    </small>
                </div>
            @endif

            {{-- Tombol Aksi --}}
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary shadow-sm rounded-pill px-4">
                    ← Kembali
                </a>

                @if (Auth::id() === $pengaduan->user_id)
                    <button type="button" class="btn btn-warning shadow-sm rounded-pill px-4 text-white"
                        data-bs-toggle="modal" data-bs-target="#editModal">
                        ✏️ Edit Pengaduan
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
@if (Auth::id() === $pengaduan->user_id)
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header bg-warning text-white rounded-top-4">
                <h5 class="modal-title fw-bold" id="editModalLabel">✏️ Edit Pengaduan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('pengaduan.update', $pengaduan->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul</label>
                        <input type="text" class="form-control rounded-pill" name="judul" id="judul"
                               value="{{ old('judul', $pengaduan->judul) }}" required>
                    </div>

                    {{-- Isi Laporan --}}
                    <div class="mb-3">
                        <label for="isi_laporan" class="form-label fw-semibold">Isi Laporan</label>
                        <textarea class="form-control rounded-4" name="isi_laporan" id="isi_laporan" rows="4"
                                  required>{{ old('isi_laporan', $pengaduan->isi_laporan) }}</textarea>
                    </div>

                    {{-- Upload Foto --}}
                    <div class="mb-3">
                        <label for="foto" class="form-label fw-semibold">Upload Foto Baru (Opsional)</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
