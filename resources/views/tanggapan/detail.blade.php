
@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    
@endif
@section('content')

    <div class="container">
        <h3 class="mb-4">Detail Pengaduan: {{ $user->name }}</h3>

        <div class="card mb-4">
            <div class="card-header">
                <strong>Data User</strong>
            </div>
            <div class="card-body">
                <p><strong>NIK:</strong> {{ $user->nik ?? '-' }}</p>
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>No HP:</strong> {{ $user->no_hp ?? '-' }}</p>
            </div>
        </div>

        <h5>Daftar Pengaduan</h5>
        @if($user->pengaduans->isEmpty())
            <div class="alert alert-info">Belum ada pengaduan dari user ini.</div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul Pengaduan</th>
                        <th>Isi Pengaduan</th>
                        <th>Status</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->pengaduans as $index => $pengaduan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pengaduan->judul ?? '-' }}</td>
                            <td>{{ $pengaduan->isi_laporan ?? '-' }}</td>
                            <td>
                                @if($pengaduan->status)
                                    <span class="badge bg-success">{{ $pengaduan->status }}</span>
                                @else
                                    <span class="badge bg-secondary">Belum diproses</span>
                                @endif
                            </td>
                            <td>{{ $pengaduan->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('tanggapan.create', ['pengaduan' => $pengaduan->id]) }}"
                                    class="btn btn-sm btn-success mb-1">Beri Tanggapan</a>

                                <form action="{{ route('pengaduan.updateStatus', $pengaduan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option disabled selected>Ubah Status</option>
                                        <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai
                                        </option>
                                    </select>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection