
@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h3 class="mb-4">Detail Tanggapan</h3>

    <div class="card">
        <div class="card-header">
            <strong>Pengaduan</strong>
        </div>
        <div class="card-body">
            <p><strong>Judul Pengaduan:</strong> {{ $tanggapan->pengaduan->judul ?? '-' }}</p>
            <p><strong>Isi Pengaduan:</strong> {{ $tanggapan->pengaduan->isi_laporan ?? '-' }}</p>
            <p><strong>Status Pengaduan:</strong> {{ $tanggapan->pengaduan->status ?? 'Belum diproses' }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <strong>Detail Tanggapan</strong>
        </div>
        <div class="card-body">
            <p><strong>Petugas:</strong> {{ $tanggapan->user->name ?? '-' }}</p>
            <p><strong>Isi Tanggapan:</strong></p>
            <p>{{ $tanggapan->isi_tanggapan }}</p>
            <p><strong>Tanggal Tanggapan:</strong> {{ $tanggapan->tanggal_tanggapan->format('d-m-Y') }}</p>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
