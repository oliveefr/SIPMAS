@extends('layouts.app_user')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="mb-4 fw-bold text-primary">✏️ Edit Pengaduan</h3>

            <div class="card shadow-lg border-0 rounded-4">
                <div class="row g-0">
                    {{-- Gambar Preview --}}
                    <div class="col-md-5 text-center p-4 bg-light">
                        @if ($pengaduan->foto)
                            <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan"
                                class="img-fluid rounded-3 shadow-sm"
                                style="max-height: 300px; object-fit: cover;">
                            <p class="mt-2 text-muted"><small>Foto sebelumnya</small></p>
                        @else
                            <div class="text-muted fst-italic mt-4">Belum ada foto</div>
                        @endif
                    </div>

                    {{-- Form --}}
                    <div class="col-md-7 p-4">
                        <form method="POST" action="{{ route('pengaduan.update', $pengaduan->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Judul --}}
                            <div class="mb-3">
                                <label for="judul" class="form-label fw-semibold">Judul Pengaduan</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control rounded-pill @error('judul') is-invalid @enderror"
                                    value="{{ old('judul', $pengaduan->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Isi Laporan --}}
                            <div class="mb-3">
                                <label for="isi_laporan" class="form-label fw-semibold">Isi Laporan</label>
                                <textarea name="isi_laporan" id="isi_laporan" rows="5"
                                    class="form-control rounded-4 @error('isi_laporan') is-invalid @enderror"
                                    required>{{ old('isi_laporan', $pengaduan->isi_laporan) }}</textarea>
                                @error('isi_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Upload Foto --}}
                            <div class="mb-3">
                                <label for="foto" class="form-label fw-semibold">Upload Foto (opsional)</label>
                                <input type="file" name="foto" id="foto"
                                    class="form-control @error('foto') is-invalid @enderror"
                                    accept="image/*">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pengaduan.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                    ← Batal
                                </a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
                                    💾 Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end card -->
        </div>
    </div>
</div>
@endsection
