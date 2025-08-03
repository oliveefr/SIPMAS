<div class="card shadow-sm border-0 rounded-4 mb-5">
    <div class="card-header bg-primary text-white text-center rounded-top-4">
        <h5 class="mb-0 fw-bold text-white">🔒 Ubah Password</h5>
         <small>{{ __("Gunakan Password yang beragam untuk memperkuat akun Anda!") }}</small>
    </div>

    <div class="card-body p-4">
        

        {{-- Alert sukses --}}
        @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                 Password berhasil diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        {{-- Form Ubah Password --}}
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            {{-- Password Lama --}}
            <div class="mb-3">
                <label for="current_password" class="form-label fw-semibold"> Password Saat Ini</label>
                <input type="password"
                       class="form-control rounded-pill @error('current_password', 'updatePassword') is-invalid @enderror"
                       id="current_password" name="current_password"
                       autocomplete="current-password" required>
                @error('current_password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password Baru --}}
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold"> Password Baru</label>
                <input type="password"
                       class="form-control rounded-pill @error('password', 'updatePassword') is-invalid @enderror"
                       id="password" name="password"
                       autocomplete="new-password" required>
                @error('password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold"> Konfirmasi Password Baru</label>
                <input type="password"
                       class="form-control rounded-pill @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                       id="password_confirmation" name="password_confirmation"
                       autocomplete="new-password" required>
                @error('password_confirmation', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol Simpan --}}
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success px-4 rounded-pill shadow">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
