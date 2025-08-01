<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Pengaduan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>

    <h2>Laporan Pengaduan Masyarakat</h2>
    <p><strong>NIK:</strong> {{ $pengaduan->user->nik }}</p>
    <p><strong>Nama:</strong> {{ $pengaduan->user->name }}</p>
    <p><strong>Email:</strong> {{ $pengaduan->user->email }}</p>
    <p><strong>No. HP:</strong> {{ $pengaduan->user->no_hp }}</p>
    <p><strong>Tanggal Pengaduan:</strong> {{ $pengaduan->created_at->format('d-m-Y') }}</p>

    <h4>Isi Laporan:</h4>
    <p>{{ $pengaduan->isi_laporan }}</p>

    @if($pengaduan->foto)
        <h4>Foto:</h4>
        <img src="{{ public_path('storage/' . $pengaduan->foto) }}" width="300">
    @endif

</body>
</html>
