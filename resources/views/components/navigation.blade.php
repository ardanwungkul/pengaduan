<nav x-data="{ open: false }"
    class="bg-watercouse-700 dark:bg-gray-800 border-y border-watercouse-600 dark:border-gray-700 shadow-lg bg-jar-wave-line fixed w-full top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="flex justify-between h-16">
            <div class="shrink-0 flex items-center">
                <a href="{{ route('welcome') }}" class="flex items-center gap-1">
                    <div class="flex items-center gap-1">
                        <img src="{{ asset('assets/images/logo-kab-paser.png') }}" class="h-16" alt="">
                        <img src="{{ asset('assets/images/logo-apip.png') }}" class="h-16" alt="">
                    </div>
                    <div>
                        <p class="font-semibold text-xl tracking-wide text-white"> Pemerintah Kabupaten Paser</p>
                        <p class="font-medium text-sm text-gray-200">Inspektorat Daerah</p>
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-5">
                <a href="{{ route('login') }}" class="py-1 text-white tracking-widest text-sm hover:border-b">Lacak
                    Pengaduan</a>
                <a href="{{ route('login') }}" class="py-1 text-white tracking-widest text-sm hover:border-b">Login</a>
            </div>


        </div>
    </div>


</nav>
