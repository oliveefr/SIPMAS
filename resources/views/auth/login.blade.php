<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login SIPMAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
</head>

<body class="bg-white">
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div
            class="bg-white rounded-2xl shadow-xl w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 border border-gray-200 overflow-hidden">

            <!-- Animasi desktop -->
            <div class="hidden md:flex flex-col items-center justify-center bg-indigo-50 p-8 text-center">
                <dotlottie-wc src="https://lottie.host/04e92c18-8de9-48d4-81c1-cc495d526045/nQPYYH007Y.lottie"
                    style="width: 100%; max-width: 450px; height: auto;" speed="1" autoplay loop>
                </dotlottie-wc>

                <!-- Deskripsi SIPMAS -->
                <div class="mt-6 px-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800">SIPMAS</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Sistem untuk menyampaikan laporan dan pengaduan masyarakat secara cepat dan mudah.
                    </p>
                </div>
            </div>

            <!-- Form Login -->
            <div class="p-6 sm:p-8 md:p-10 lg:p-12 relative">

                <!-- Animasi mobile -->
                <div class="block md:hidden mb-6 flex justify-center">
                    <dotlottie-wc src="https://lottie.host/04e92c18-8de9-48d4-81c1-cc495d526045/nQPYYH007Y.lottie"
                        style="width: 100%; max-width: 300px; height: auto;" speed="1" autoplay loop>
                    </dotlottie-wc>
                </div>

                <div class="text-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900">Login SIPMAS</h2>
                    <p class="text-gray-500 text-sm">Sistem Informasi Pengaduan Masyarakat</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email"
                            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            type="email" name="email" :value="old('email')" required autofocus
                            placeholder="email@example.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password"
                            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            type="password" name="password" required placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded text-indigo-600 border-gray-300">
                            <span class="ml-2 text-sm text-gray-700">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Tombol Login -->
                    <x-primary-button
                        class="w-full flex justify-center py-3 px-4 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                        {{ __('Log in') }}
                    </x-primary-button>

                    <p class="text-gray-500 text-sm">
                        Belum punya akun? <a href="/register" class="text-blue-600 hover:underline">Daftar sekarang</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
