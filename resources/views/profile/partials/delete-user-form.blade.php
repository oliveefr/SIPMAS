<div class="card shadow-sm border-0 rounded-4 mb-5">
    <div class="card-header bg-danger text-white text-center rounded-top-4">
        <h5 class="mb-0 fw-bold text-white">🗑️ Hapus Akun</h5>
    </div>

    <div class="card-body p-4">
        <p class="text-muted">
            Setelah akun Anda dihapus, semua data dan informasi terkait akan <strong>hilang secara permanen</strong>.
            Pastikan Anda telah mencadangkan data penting sebelum melanjutkan.
        </p>

        <!-- Tombol Trigger Modal -->
        <div class="text-end mt-4">
            <button class="btn btn-danger rounded-pill shadow-sm px-4" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                <i class="bi bi-trash me-1"></i> Hapus Akun
            </button>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Akun -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('profile.destroy') }}" class="modal-content rounded-4 shadow">
            @csrf
            @method('DELETE')

            <div class="modal-header bg-danger text-white rounded-top-4">
                <h5 class="modal-title" id="deleteAccountModalLabel">⚠️ Konfirmasi Penghapusan Akun</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <p class="text-danger fw-semibold">
                    Apakah Anda yakin ingin menghapus akun Anda?
                    <br>Proses ini <u>tidak dapat dibatalkan</u>.
                </p>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Masukkan Password Anda</label>
                    <input type="password" name="password" id="password"
                        class="form-control rounded-pill @if ($errors->userDeletion->get('password')) is-invalid @endif"
                        placeholder="Password" required>
                    @if ($errors->userDeletion->get('password'))
                        <div class="invalid-feedback">
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-danger rounded-pill px-4">
                    🗑️ Hapus Akun
                </button>
            </div>
        </form>
    </div>
</div>
