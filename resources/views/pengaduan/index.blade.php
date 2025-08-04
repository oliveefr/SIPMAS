@extends('layouts.app_user')

@section('title', 'Daftar Pengaduan')

@section('content')

    @include('partials.featured-services')

    @include('partials.call-to-action')

    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Tabel Pengaduan Proses --}}
        @if ($pengaduans->where('status', 'proses')->count() > 0)
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">Pengaduan yang Memerlukan Tanggapan</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover m-0">
                        <thead class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $p)
                                @if ($p->status === 'proses')
                                    <tr>
                                        <td>{{ $p->judul }}</td>
                                        <td>{{ Str::limit($p->isi_laporan, 50) }}</td>
                                        <td><span class="badge bg-warning">{{ ucfirst($p->status) }}</span></td>
                                        <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            @if ($p->tanggapan)
                                                {{ Str::limit($p->tanggapan->isi_tanggapan, 50) }}
                                            @else
                                                <span class="text-muted">Belum ada</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        @endif
    </div>

    @if (session('success'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055">
            <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var toastEl = document.getElementById('successToast');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            });
        </script>
    @endif

@endsection
