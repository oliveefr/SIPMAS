@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Masyarakat yang Mengajukan Pengaduan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Jumlah Pengaduan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->nik ?? '-' }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->no_hp ?? '-' }}</td>
                    <td>{{ $user->pengaduans_count }}</td>
                    <td>
                        <a href="{{ route('tanggapan.detail', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada masyarakat yang mengajukan pengaduan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
