<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-3">

                <form method="GET" action="{{ route('dashboard') }}">
                    <input type="month" name="filter_month" value="{{ request('filter_month', date('Y-m')) }}"
                        class="rounded-lg border-gray-300 shadow-lg w-full" onchange="this.form.submit()">
                </form>
            </div>
            <a href="{{ route('pengaduan.index') }}"
                class="bg-white hover:bg-gray-50 transition-colors duration-300 rounded-lg p-5 shadow-lg border border-gray-300">
                <p class="text-xl text-center font-semibold">{{ $pengaduan_count }}</p>
                <p class="text-center">Jumlah Pengaduan</p>
            </a>
            <a href="{{ route('pengaduan.index', ['filter' => 'diterima']) }}"
                class="bg-white hover:bg-gray-50 transition-colors duration-300 rounded-lg p-5 shadow-lg border border-gray-300">
                <p class="text-xl text-center font-semibold">{{ $pengaduan_diterima_count }}</p>
                <p class="text-center">Pengaduan Diterima</p>
            </a>
            <a href="{{ route('pengaduan.index', ['filter' => 'ditolak']) }}"
                class="bg-white hover:bg-gray-50 transition-colors duration-300 rounded-lg p-5 shadow-lg border border-gray-300">
                <p class="text-xl text-center font-semibold">{{ $pengaduan_ditolak_count }}</p>
                <p class="text-center">Pengaduan Ditolak</p>
            </a>
        </div>
    </div>
</x-app-layout>
