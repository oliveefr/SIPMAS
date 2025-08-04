@extends('layouts.app_user')

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

        <!-- Dropdown Kategori -->
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Laporan</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Infrastruktur" {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                <option value="Lingkungan" {{ old('kategori') == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
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
