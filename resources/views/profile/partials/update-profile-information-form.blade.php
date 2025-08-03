<section class="container my-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h2 class="h5 fw-bold mb-1">{{ __('Profile Information') }}</h2>
            <small>{{ __("Update your account's profile information and email address.") }}</small>
        </div>

        <div class="card-body p-4">
            {{-- Form verifikasi ulang email --}}
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            {{-- Form update profil --}}
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                {{-- Input Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                    <input id="name" name="name" type="text"
                        class="form-control rounded-pill @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}"
                        required autofocus autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input id="email" name="email" type="email"
                        class="form-control rounded-pill @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}"
                        required autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    {{-- Email Belum Diverifikasi --}}
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="alert alert-warning rounded-3 mt-3 py-2 px-3">
                            <p class="mb-1 small">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ __('Your email address is unverified.') }}
                            </p>
                            <button form="send-verification"
                                class="btn btn-sm btn-outline-primary mt-2"
                                type="submit">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>

                            @if (session('status') === 'verification-link-sent')
                                <p class="text-success small mt-2 mb-0">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Tombol Simpan --}}
                <div class="d-flex align-items-center justify-content-end gap-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        💾 {{ __('Save Changes') }}
                    </button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-success small mb-0"
                        >
                            ✅ {{ __('Changes saved.') }}
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
