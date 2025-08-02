
@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h3 class="mb-4">Beri Tanggapan untuk Pengaduan: {{ $pengaduan->judul }}</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tanggapan.store') }}" method="POST">
                @csrf

                <!-- Hidden field untuk pengaduan_id -->
                <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">

                <div class="mb-3">
                    <label class="form-label">Judul Pengaduan</label>
                    <input type="text" class="form-control" value="{{ $pengaduan->judul }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengaduan</label>
                    <textarea class="form-control" rows="3" disabled>{{ $pengaduan->isi_laporan }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="isi_tanggapan" class="form-label">Isi Tanggapan</label>
                    <textarea name="isi_tanggapan" id="isi_tanggapan" class="form-control @error('isi_tanggapan') is-invalid @enderror" rows="4" required>{{ old('isi_tanggapan') }}</textarea>
                    @error('isi_tanggapan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_tanggapan" class="form-label">Tanggal Tanggapan</label>
                    <input type="date" name="tanggal_tanggapan" id="tanggal_tanggapan" class="form-control @error('tanggal_tanggapan') is-invalid @enderror" value="{{ old('tanggal_tanggapan', date('Y-m-d')) }}" required>
                    @error('tanggal_tanggapan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                <a href="{{ route('tanggapan.detail', ['user' => $pengaduan->user_id]) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
