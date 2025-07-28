<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-green-800">Selamat Datang di</h1>
        <h2 class="text-4xl font-extrabold text-green-900 tracking-wide">SIPMAS</h2>
        <p class="mt-2 text-sm text-gray-600">Silakan login untuk melanjutkan</p>
    </div>

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

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" required autofocus
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
        </div>

        {{-- Tombol Login --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-5 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-200 shadow">
                Login
            </button>
        </div>
    </form>
</x-guest-layout>
