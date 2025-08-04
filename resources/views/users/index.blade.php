@extends('partials.dashboard')
@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection
<!-- Font Awesome 6 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


@section('content')
    <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Data Masyarakat</h2>
                <p class="text-muted mb-0">Kelola data masyarakat terdaftar dalam sistem</p>
            </div>

        </div>

        <!-- Alert Section -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                                    <i class="fas fa-users text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="text-xs fw-bold text-primary text-uppercase mb-1">Total Masyarakat</div>
                                <div class="h5 mb-0 fw-bold">{{ $users->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-success bg-opacity-10 rounded-3 p-3">
                                    <i class="fas fa-user-check text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="text-xs fw-bold text-success text-uppercase mb-1">Aktif Hari Ini</div>
                                <div class="h5 mb-0 fw-bold">{{ $users->where('created_at', '>=', today())->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-info bg-opacity-10 rounded-3 p-3">
                                    <i class="fas fa-calendar-plus text-info fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="text-xs fw-bold text-info text-uppercase mb-1">Bulan Ini</div>
                                <div class="h5 mb-0 fw-bold">
                                    {{ $users->where('created_at', '>=', now()->startOfMonth())->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-warning bg-opacity-10 rounded-3 p-3">
                                    <i class="fas fa-chart-line text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="text-xs fw-bold text-warning text-uppercase mb-1">Growth Rate</div>
                                <div class="h5 mb-0 fw-bold">+12%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold text-dark">Daftar Masyarakat</h6>
                    <div class="d-flex gap-2">

                        <form method="GET" action="{{ route('users.index') }}" class="flex items-center space-x-2">
                            <select name="filter" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                                <option value="">Semua</option>
                                <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Hari ini
                                </option>
                                <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>Minggu ini
                                </option>
                                <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>Bulan ini
                                </option>
                            </select>
                        </form>

                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold">No</th>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold">NIK</th>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold">Nama</th>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold">Email</th>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold">No. HP</th>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold">Terdaftar</th>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="border-bottom">
                                    <td class="px-4 py-3">
                                        <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <code class="text-primary">{{ $user->nik }}</code>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="width: 40px; height: 40px;">
                                                <i class="fas fa-user text-primary"></i>
                                            </div>
                                          
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-envelope text-muted me-2"></i>
                                            <span>{{ $user->email }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-phone text-muted me-2"></i>
                                            <span>{{ $user->no_hp }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-calendar text-muted me-2"></i>
                                            <span>{{ $user->created_at->format('d-m-Y') }}</span>
                                        </div>

                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <!-- Tombol Lihat -->
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="w-9 h-9 flex items-center justify-center border border-blue-500 text-blue-500 rounded hover:bg-blue-500 hover:text-white transition"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-9 h-9 flex items-center justify-center border border-red-500 text-red-500 rounded hover:bg-red-500 hover:text-white transition"
                                                    title="Hapus Data">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="bg-light rounded-circle p-4 mb-3">
                                                <i class="fas fa-users text-muted fs-1"></i>
                                            </div>
                                            <h5 class="text-muted mb-2">Belum ada data masyarakat</h5>
                                            <p class="text-muted mb-3">Mulai tambahkan data masyarakat untuk melihatnya di
                                                sini</p>

                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination Footer -->
            @if ($users->count() > 0)
                <div class="card-footer bg-white border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Menampilkan {{ $users->count() }} dari {{ $users->count() }} data
                        </small>
                        <nav aria-label="Table pagination">
                            <!-- Pagination akan ditambahkan jika menggunakan paginate() -->
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .btn-group .btn {
            border-radius: 0.375rem !important;
            margin-right: 2px;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        .badge {
            font-size: 0.75em;
        }

        code {
            font-size: 0.875em;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            background-color: rgba(0, 123, 255, 0.1);
        }

        .bg-opacity-10 {
            background-color: rgba(var(--bs-primary-rgb), 0.1) !important;
        }

        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
            }

            .btn-group .btn {
                margin-bottom: 2px;
                margin-right: 0;
            }
        }
    </style>

    <!-- JavaScript for enhanced functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Search functionality
            const searchInput = document.querySelector('input[placeholder="Cari masyarakat..."]');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const tableRows = document.querySelectorAll('tbody tr');

                    tableRows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        });
    </script>
@endsection
