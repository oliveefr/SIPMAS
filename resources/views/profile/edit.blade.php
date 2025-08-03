@extends('layouts.app_user')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- Sidebar --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                         alt="Avatar" class="rounded-circle mb-3 shadow-sm" width="100" height="100">
                    <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
                    <p class="text-muted small mb-0">{{ Auth::user()->email }}</p>

                    <hr class="my-4">

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary rounded-pill" onclick="showSection('profileSection')">📝 Info Profil</button>
                        <button class="btn btn-primary rounded-pill" onclick="showSection('passwordSection')">🔒 Ganti Password</button>
                        <button class="btn btn-danger rounded-pill" onclick="showSection('deleteSection')">🗑️ Hapus Akun</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Konten Dinamis --}}
        <div class="col-md-8">
            <div id="profileSection" class="content-section">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div id="passwordSection" class="content-section d-none">
                @include('profile.partials.update-password-form')
            </div>

            <div id="deleteSection" class="content-section d-none">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

{{-- Script: Kontrol Tampilan Section --}}
<script>
    function showSection(id) {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.classList.add('d-none'));

        const activeSection = document.getElementById(id);
        if (activeSection) {
            activeSection.classList.remove('d-none');
            activeSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>
@endsection
