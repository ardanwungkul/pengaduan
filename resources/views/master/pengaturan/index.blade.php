<x-app-layout>
    <x-slot name="header">
        {{ __('Pengaturan') }}
    </x-slot>
    <div class="space-y-4">
        <div class="bg-white border border-gray-300 shadow-lg rounded-lg space-y-4 overflow-y-hidden p-1">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500">
                <li class="me-2">
                    <a href="{{ route('pengaturan.index', ['tab' => 'subjek_laporan']) }}" aria-current="page"
                        class="{{ request('tab') == 'subjek_laporan' ? 'inline-block p-4 text-blue-600 bg-gray-100 rounded-lg' : 'inline-block p-4 rounded-lg hover:text-gray-600 hover:bg-gray-50' }}">Subjek
                        Laporan</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('pengaturan.index', ['tab' => 'kategori_instansi']) }}"
                        class="{{ request('tab') == 'kategori_instansi' ? 'inline-block p-4 text-blue-600 bg-gray-100 rounded-lg' : 'inline-block p-4 rounded-lg hover:text-gray-600 hover:bg-gray-50' }}">Kategori
                        Instansi</a>
                </li>
            </ul>
        </div>
        @if (request('tab') == 'subjek_laporan')
            <div class="p-5 bg-white border border-gray-300 shadow-lg rounded-lg space-y-4">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Subjek Laporan') }}
                    </h2>
                </header>
                <button type="button" data-modal-target="tambah-subjek-laporan"
                    data-modal-toggle="tambah-subjek-laporan"
                    class="bg-green-500 text-white px-5 py-2 rounded-lg shadow-lg text-xs hover:bg-opacity-90 mb-4">Tambah
                    Subjek
                    Laporan</button>
                <x-modal.tambah-subjek-laporan />
                <div class="relative">
                    <div class="rounded-lg border border-gray-300 shadow-lg overflow-hidden">
                        <table class="w-full" id="table-jenis">
                            <thead class="bg-gray-200 ">
                                <tr class="text-xs">
                                    <th>Subjek Laporan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($subjek as $item)
                                    <tr>
                                        <td>{{ $item->nama_subjek }}</td>
                                        <td class="flex items-center justify-center gap-3">
                                            <button type="button"
                                                data-modal-target="confirm-delete-{{ $item->id }}"
                                                data-modal-toggle="confirm-delete-{{ $item->id }}"
                                                class="flex items-center gap-1 bg-red-500 px-3 py-1 rounded-lg text-white hover:bg-opacity-90 border shadow-lg">
                                                <svg viewBox="0 0 24 24" class="stroke-white fill-none w-5 h-5"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M10 11V17" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M14 11V17" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M4 7H20" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                        <path
                                                            d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                    </g>
                                                </svg>
                                                <p class="whitespace-nowrap">Hapus</p>
                                            </button>
                                            <x-modal.confirm-delete :id="$item->id" :name="'Subjek Laporan'"
                                                :action="route('subjek-laporan.destroy', $item->id)" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        @if (request('tab') == 'kategori_instansi')
            <div class="p-5 bg-white border border-gray-300 shadow-lg rounded-lg space-y-4">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Kategori Instansi') }}
                    </h2>
                </header>
                <button type="button" data-modal-target="tambah-kategori-instansi"
                    data-modal-toggle="tambah-kategori-instansi"
                    class="bg-green-500 text-white px-5 py-2 rounded-lg shadow-lg text-xs hover:bg-opacity-90 mb-4">Tambah
                    Kategori Instansi</button>
                <x-modal.tambah-kategori-instansi :kategori="$kategori" />
                <div class="relative">
                    <div class="rounded-lg border border-gray-300 shadow-lg overflow-hidden">
                        <table class="w-full" id="table-kategori">
                            <thead class="bg-gray-200 ">
                                <tr class="text-xs">
                                    <th data-priority="3">Nama Kategori</th>
                                    <th data-priority="1">Nama Jenis Instansi </th>
                                    <th data-priority="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($instansi as $item)
                                    <tr>
                                        <td>{{ $item->kategori->nama_kategori }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="flex items-center justify-center gap-3">
                                            @if ($instansi->count() > 1)
                                                <button type="button"
                                                    data-modal-target="confirm-delete-{{ $item->id }}"
                                                    data-modal-toggle="confirm-delete-{{ $item->id }}"
                                                    class="flex items-center gap-1 bg-red-500 px-3 py-1 rounded-lg text-white hover:bg-opacity-90 border shadow-lg">
                                                    <svg viewBox="0 0 24 24" class="stroke-white fill-none w-5 h-5"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M10 11V17" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path d="M14 11V17" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path d="M4 7H20" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                            <path
                                                                d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <p class="whitespace-nowrap">Hapus</p>
                                                </button>
                                                <x-modal.confirm-delete :id="$item->id" :name="'Kategori Instansi'"
                                                    :action="route('kategori-instansi.destroy', $item->id)" />
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        @if (request('tab') == 'subjek_laporan')
            let tableJenis = $('#table-jenis').DataTable({
                info: false,
                lengthChange: false,
                paging: false,
                language: {
                    search: '',
                    searchPlaceholder: 'Search...'
                },
                searching: false,
                columnDefs: [{
                        className: "dt-center",
                        targets: [1]
                    },
                    {
                        orderable: false,
                        targets: [1]
                    }
                ],
                order: []
            });
        @endif
        @if (request('tab') == 'kategori_instansi')
            let tablekategori = $('#table-kategori').DataTable({
                info: false,
                lengthChange: false,
                paging: false,
                language: {
                    search: '',
                    searchPlaceholder: 'Search...'
                },
                searching: false,
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: [1]
                }],
            });
        @endif
    });
</script>
