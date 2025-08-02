<div class="card mb-4">
    <div class="card-header bg-danger text-white text-center">
        <h5 class="mb-0 text-light fw-bold">Hapus Akun</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">
            Setelah akun Anda dihapus, semua data dan informasi terkait akan dihapus secara permanen.
            Pastikan Anda telah menyimpan data yang diperlukan sebelum melanjutkan.
        </p>

        <!-- Tombol Trigger Modal -->
        <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
            <i class="bi bi-trash me-1"></i> Hapus Akun
        </button>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Akun -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('profile.destroy') }}" class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteAccountModalLabel">Konfirmasi Hapus Akun</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus akun Anda? Semua data akan hilang secara permanen.</p>

                <div class="mb-3">
                    <label for="password" class="form-label">Masukkan Password Anda</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    @if ($errors->userDeletion->get('password'))
                        <div class="text-danger mt-1">
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus Akun</button>
            </div>
        </form>
    </div>
</div>
