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
                    <div class="hidden sm:block">
                        <p class="font-semibold text-base md:text-xl tracking-wide text-white">Pemerintah Kabupaten
                            Paser
                        </p>
                        <p class="font-medium text-sm text-gray-200">Inspektorat Daerah</p>
                    </div>
                </a>
            </div>

            <div class="lg:flex items-center gap-5 hidden">
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


            <div class="text-center lg:hidden flex items-center">
                <div>
                    <button
                        class="text-white border border-gray-400 rounded-lg p-2 hover:bg-white hover:text-watercouse-700 transition-all duration-300"
                        type="button" data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M5 7h14M5 12h14M5 17h14" />
                        </svg>

                    </button>
                </div>
                <div id="drawer-navigation"
                    class="fixed top-20 left-0 z-50 h-[calc(100vh-80px)] p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-navigation-label">
                    <h5 id="drawer-navigation-label"
                        class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400 text-start">Menu</h5>
                    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close menu</span>
                    </button>
                    <div class="py-4 overflow-y-auto">
                        <ul class="space-y-2 font-medium">
                            <li>
                                <a href="{{ route('laporan.track') }}"
                                    class="p-2 text-gray-900 rounded-lg block w-full text-start">
                                    <p>Lacak Pengaduan</p>
                                </a>
                            </li>
                            @if (Auth::user())
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                            class="p-2 text-gray-900 rounded-lg block w-full text-start">
                                            Logout
                                        </a>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="p-2 text-gray-900 rounded-lg block w-full text-start">
                                        <p>Login</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>




        </div>
    </div>


</nav>
