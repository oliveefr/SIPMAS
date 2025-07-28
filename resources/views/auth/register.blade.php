<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-b from-green-100 to-green-300">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-center text-green-800 mb-6">Daftar Akun SIPMAS</h2>

            {{-- Notifikasi Error --}}
            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input id="name" type="text" name="name" required autofocus
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500" />
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" required
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500" />
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500" />
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500" />
                </div>

                {{-- Tombol Submit --}}
                <button type="submit"
                    class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition duration-200">
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
