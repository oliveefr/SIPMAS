<section id="featured-services" class="featured-services section">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon"><i class="fas fa-bullhorn icon"></i></div>
                    <h4><a href="#" data-bs-toggle="modal" data-bs-target="#buatPengaduanModal"
                            class="stretched-link">Lapor</a></h4>
                    <p>Buat Laporan Pengaduan Anda Di sini ^</p>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon"><i class="fas fa-sticky-note icon"></i></div>
                    <h4>
                        <a href="#" class="stretched-link" data-bs-toggle="modal"
                            data-bs-target="#modalSemuaPengaduan">
                            Pengaduan Anda
                        </a>
                    </h4>
                    <p>Lihat daftar pengaduan yang telah Anda kirimkan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Buat Pengaduan -->
<div class="modal fade" id="buatPengaduanModal" tabindex="-1" aria-labelledby="buatPengaduanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-light border-0 rounded-4 shadow-lg">
            <div class="modal-header bg-navy text-white">
                <h5 class="modal-title text-white" id="buatPengaduanModalLabel"><i class="bi bi-megaphone me-2"></i>
                    Buat Pengaduan
                    Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Ups!</strong> Ada kesalahan dalam input data:
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="mb-3">
                        <label for="kategori" class="form-label">Jenis Pengaduan</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">-- Pilih Pengaduan --</option>
                            <option value="Infrastruktur" {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>
                                Infrastruktur</option>
                            <option value="Lingkungan" {{ old('kategori') == 'Lingkungan' ? 'selected' : '' }}>
                                Lingkungan</option>
                            <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan
                            </option>
                            <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pengaduan</label>
                        <input type="text" name="judul" class="form-control rounded-pill" id="judul"
                            value="{{ old('judul') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi_laporan" class="form-label">Isi Laporan</label>
                        <textarea name="isi_laporan" class="form-control rounded-3" id="isi_laporan" rows="5" required>{{ old('isi_laporan') }}</textarea>
                    </div>



                    <div class="mb-3">
                        <label for="foto" class="form-label">Unggah Foto (Opsional)</label>
                        <input type="file" name="foto" class="form-control" id="foto" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger button-right-danger"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send-fill me-1"></i> Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Semua Pengaduan -->
<div class="modal fade" id="modalSemuaPengaduan" tabindex="-1" aria-labelledby="modalSemuaPengaduanLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-light border-0 rounded-4 shadow-lg">
            <div class="modal-header bg-navy text-white">
                <h5 class="modal-title text-white" id="modalSemuaPengaduanLabel">
                    <i class="bi bi-list-task me-2"></i> Semua Pengaduan Anda
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Tabel Semua Pengaduan --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover m-0">
                        <thead class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengaduans as $p)
                                <tr>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ Str::limit($p->isi_laporan, 50) }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $p->status == 'selesai' ? 'bg-success' : ($p->status == 'proses' ? 'bg-warning' : 'bg-secondary') }}">
                                            {{ ucfirst($p->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('pengaduan.show', $p->id) }}"
                                            class="btn btn-sm btn-info text-secondary">Lihat</a>
                                        <form action="{{ route('pengaduan.destroy', $p->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada pengaduan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
