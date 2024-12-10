<x-auth-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            {{-- <x-input-label for="name" :value="__('Name')" /> --}}
            <x-text-input id="name" class="block mt-1 w-full text-sm" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" placeholder="Masukkan Nama Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
            <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email"
                :value="old('email')" required autocomplete="username" placeholder="Masukkan Email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}

            <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required
                autocomplete="new-password" placeholder="Masukkan Kata Sandi" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

            <x-text-input id="password_confirmation" class="block mt-1 w-full text-sm" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button
            class="bg-watercouse-600 hover:bg-opacity-80 transition-colors duration-300 px-10 py-1 text-white rounded-lg shadow-lg text-sm w-full h-[37.33px]">Daftar</button>
        <div class="mt-4 flex gap-2 items-center justify-center">
            <p class="text-center text-sm w-min whitespace-nowrap">Sudah mempunyai akun?</p><a
                href="{{ route('login') }}" class="text-sm text-blue-500 hover:text-blue-600 hover:underline">Login</a>
        </div>
    </form>
</x-auth-layout>
