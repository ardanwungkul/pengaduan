<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div>
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white rounded-lg p-5 shadow-lg border border-gray-300">
                <p class="text-xl text-center font-semibold">0</p>
                <p class="text-center">Jumlah Pengaduan</p>
            </div>
            <div class="bg-white rounded-lg p-5 shadow-lg border border-gray-300">
                <p class="text-xl text-center font-semibold">0</p>
                <p class="text-center">Pengaduan Diterima</p>
            </div>
            <div class="bg-white rounded-lg p-5 shadow-lg border border-gray-300">
                <p class="text-xl text-center font-semibold">0</p>
                <p class="text-center">Pengaduan Ditolak</p>
            </div>
        </div>
    </div>
</x-app-layout>
