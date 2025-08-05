<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi SIPMAS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
</head>

<body class="bg-white">
  <div class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 border border-gray-200 overflow-hidden">

      <!-- Animasi desktop -->
      <div class="hidden md:flex flex-col items-center justify-center bg-indigo-50 p-8 text-center">
        <dotlottie-wc
          src="https://lottie.host/04e92c18-8de9-48d4-81c1-cc495d526045/nQPYYH007Y.lottie"
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

      <!-- Form Registrasi -->
      <div class="p-6 sm:p-10">
        <!-- Animasi mobile -->
        <div class="block md:hidden mb-6 flex justify-center">
          <dotlottie-wc
            src="https://lottie.host/04e92c18-8de9-48d4-81c1-cc495d526045/nQPYYH007Y.lottie"
            style="width: 100%; max-width: 250px; height: auto;" speed="1" autoplay loop>
          </dotlottie-wc>
        </div>

        <!-- Judul -->
        <div class="text-center mb-8">
          <h2 class="text-3xl font-bold text-gray-900">Registrasi SIPMAS</h2>
          <p class="text-gray-500 text-sm">
            Daftarkan akun Anda untuk mulai melaporkan pengaduan.
          </p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
          @csrf

          <!-- NIK -->
          <div>
            <input
              id="nik"
              type="text"
              name="nik"
              placeholder="NIK"
              class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              value="{{ old('nik') }}"
              required
              autofocus
            />
            <x-input-error :messages="$errors->get('nik')" class="mt-1 text-sm text-red-600" />
          </div>

          <!-- Nama Lengkap -->
          <div>
            <input
              id="name"
              type="text"
              name="name"
              placeholder="Nama Lengkap"
              class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              value="{{ old('name') }}"
              required
            />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
          </div>

          <!-- Email -->
          <div>
            <input
              id="email"
              type="email"
              name="email"
              placeholder="Email"
              class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              value="{{ old('email') }}"
              required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
          </div>

          <!-- No HP -->
          <div>
            <input
              id="no_hp"
              type="text"
              name="no_hp"
              placeholder="No. HP"
              class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              value="{{ old('no_hp') }}"
              required
            />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-1 text-sm text-red-600" />
          </div>

          <!-- Password -->
          <div>
            <input
              id="password"
              type="password"
              name="password"
              placeholder="Password"
              class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              required
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
          </div>

          <!-- Konfirmasi Password -->
          <div>
            <input
              id="password_confirmation"
              type="password"
              name="password_confirmation"
              placeholder="Konfirmasi Password"
              class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              required
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
          </div>

          <!-- Tombol Daftar -->
          <div class="flex items-center justify-between">
            <p class="text-sm text-gray-600">
              
              <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">Masuk di sini</a>
            </p>
            <x-primary-button class="py-3 px-6 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
              {{ __('Daftar') }}
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
