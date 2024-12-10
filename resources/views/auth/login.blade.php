<x-auth-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
            <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" placeholder="Masukkan Email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            {{-- <x-input-label for="password" :value="__('Kata Sandi')" /> --}}
            <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required
                autocomplete="current-password" placeholder="Masukkan Kata Sandi" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <button
            class="bg-watercouse-600 hover:bg-opacity-80 transition-colors duration-300 px-10 py-1 text-white rounded-lg shadow-lg text-sm w-full h-[37.33px]">Login</button>

        <div class="mt-4 flex gap-2 items-center justify-center">
            <p class="text-center text-sm w-min whitespace-nowrap">Belum mempunyai akun?</p><a
                href="{{ route('register') }}"
                class="text-sm text-blue-500 hover:text-blue-600 hover:underline">Daftar</a>
        </div>
    </form>
</x-auth-layout>
