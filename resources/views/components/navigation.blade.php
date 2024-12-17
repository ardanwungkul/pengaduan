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
                <a href="{{ route('laporan.track') }}"
                    class="py-1 text-white tracking-widest text-sm hover:border-b">Lacak
                    Pengaduan</a>
                @if (Auth::user())
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="py-1 text-white tracking-widest text-sm hover:border-b flex items-center gap-1"
                        type="button">
                        <p>Hii, {{ Auth::user()->name }}!! </p>
                        <svg class="w-2.5 h-2.5 ms-3 fill-none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow min-w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="py-1 text-white tracking-widest text-sm hover:border-b">Login</a>
                @endif
            </div>


        </div>
    </div>


</nav>
