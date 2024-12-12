<x-app-layout>
    <x-slot name="header">
        {{ __('Pengaturan') }}
    </x-slot>
    <div class="p-5 bg-white border border-gray-300 shadow-lg rounded-lg space-y-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Jenis Pengaduan') }}
            </h2>
        </header>
        <button type="button" data-modal-target="tambah-jenis-pengaduan" data-modal-toggle="tambah-jenis-pengaduan"
            class="bg-green-500 text-white px-5 py-2 rounded-lg shadow-lg text-xs hover:bg-opacity-90 mb-4">Tambah
            Jenis Pengaduan</button>
        <x-modal.tambah-jenis-pengaduan />
        <div class="relative">
            <div class="rounded-lg border border-gray-300 shadow-lg overflow-hidden">
                <table class="w-full" id="table-jenis">
                    <thead class="bg-gray-200 ">
                        <tr class="text-xs">
                            <th>Jenis Pengaduan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($jenis as $item)
                            <tr>
                                <td>{{ $item->nama_jenis }}</td>
                                <td class="flex items-center justify-center gap-3">
                                    <button type="button" data-modal-target="confirm-delete-{{ $item->id }}"
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
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </g>
                                        </svg>
                                        <p class="whitespace-nowrap">Hapus</p>
                                    </button>
                                    <x-modal.confirm-delete :id="$item->id" :name="'Jenis Pengaduan'" :action="route('jenis-pengaduan.destroy', $item->id)" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="p-5 bg-white border border-gray-300 shadow-lg rounded-lg space-y-4 mt-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Kategori Instansi') }}
            </h2>
        </header>
        <button type="button" data-modal-target="tambah-kategori-instansi" data-modal-toggle="tambah-kategori-instansi"
            class="bg-green-500 text-white px-5 py-2 rounded-lg shadow-lg text-xs hover:bg-opacity-90 mb-4">Tambah
            Kategori Instansi</button>
        <x-modal.tambah-kategori-instansi :kategori="$kategori" />
        <div class="relative">
            <div class="rounded-lg border border-gray-300 shadow-lg overflow-hidden">
                <table class="w-full" id="table-kategori">
                    <thead class="bg-gray-200 ">
                        <tr class="text-xs">
                            <th>Nama Kategori</th>
                            <th>Nama Jenis Instansi </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($instansi as $item)
                            <tr>
                                <td>{{ $item->kategori->nama_kategori }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="flex items-center justify-center gap-3">
                                    <button type="button" data-modal-target="confirm-delete-{{ $item->id }}"
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
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </g>
                                        </svg>
                                        <p class="whitespace-nowrap">Hapus</p>
                                    </button>
                                    <x-modal.confirm-delete :id="$item->id" :name="'Kategori Instansi'" :action="route('kategori-instansi.destroy', $item->id)" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
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
            ]
        });
        let tablekategori = $('#table-kategori').DataTable({
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
            ]
        });
    });
</script>
