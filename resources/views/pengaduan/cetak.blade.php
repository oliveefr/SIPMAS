<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Laporan Pengaduan Masyarakat</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelapor</th>
                <th>Judul</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduans as $i => $p)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $p->user->name ?? '-' }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->isi_laporan }}</td>
                    <td>{{ ucfirst($p->status) }}</td>
                    <td>{{ $p->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
