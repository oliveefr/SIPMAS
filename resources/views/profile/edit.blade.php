@extends('layouts.app_user')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Form Update Informasi Profil --}}
                    @include('profile.partials.update-profile-information-form')

            {{-- Form Update Password --}}
                    @include('profile.partials.update-password-form')


            {{-- Form Hapus Akun --}}
                    @include('profile.partials.delete-user-form')


        </div>
    </div>
</div>
@endsection
