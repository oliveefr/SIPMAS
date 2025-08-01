<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tanggapan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Tanggapan Pengaduan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Pengaduan</th>
                <th>Isi Tanggapan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanggapans as $i => $t)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $t->pengaduan->judul }}</td>
                    <td>{{ $t->isi_tanggapan }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->tanggal_tanggapan)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
