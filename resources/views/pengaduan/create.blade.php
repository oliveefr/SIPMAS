@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Buat Pengaduan Baru</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan dalam input data:<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Pengaduan</label>
            <input type="text" name="judul" class="form-control" id="judul" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="isi_laporan" class="form-label">Isi Laporan</label>
            <textarea name="isi_laporan" class="form-control" id="isi_laporan" rows="5" required>{{ old('isi_laporan') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Unggah Foto (Opsional)</label>
            <input type="file" name="foto" class="form-control" id="foto" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
