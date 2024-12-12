<x-app-layout>
    <x-slot name="header">
        {{ __('Daftar Pengaduan Masuk') }}
    </x-slot>
    <div class="p-5 pt-16 bg-white border border-gray-300 shadow-lg rounded-lg">
        <div class="relative">
            <div class="rounded-lg border border-gray-300 shadow-lg overflow-hidden">
                <table id="table" class="w-full">
                    <thead class="bg-gray-200">
                        <tr class="text-xs">
                            <th class="!font-semibold text-center">Nomor Pendaftaran</th>
                            <th class="!font-semibold text-center">Kategori</th>
                            <th class="!font-semibold text-center">Nama Pelapor</th>
                            <th class="!font-semibold text-center">Tanggal dan Lokasi Kejadian</th>
                            <th class="!font-semibold text-center">Status</th>
                            <th class="!font-semibold text-center">Keterangan</th>
                            <th class="!font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($pengaduan as $item)
                            <tr class="text-xs">
                                <td>{{ $item->nomor_pendaftaran }}</td>
                                <td>{{ $item->kategori->nama_kategori }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <p>
                                        {{ $item->tanggal_kejadian }}
                                    </p>
                                    <p>
                                        {{ $item->lokasi_kejadian }}
                                    </p>
                                </td>
                                <td>
                                    <p
                                        class="{{ $item->status == 'Diterima' ? 'text-green-500' : ($item->status == 'Ditolak' ? 'text-red-500' : '') }}">
                                        {{ $item->status }}</p>
                                    <p class="text-xs text-gray-500">{{ $item->tanggal_status }}</p>
                                </td>
                                <td>
                                    <p class="text-start">
                                        {{ $item->keterangan_ditolak }}
                                    </p>
                                </td>
                                <td class="flex justify-center items-center">
                                    <button data-modal-target="show-detail-{{ $item->id }}"
                                        data-modal-toggle="show-detail-{{ $item->id }}"
                                        class="flex items-center gap-2 bg-watercouse-500 px-3 py-1 rounded-lg text-white hover:bg-opacity-90 border shadow-lg">
                                        <svg class="fill-white w-5 h-5" version="1.1" id="_x32_"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                            xml:space="preserve">
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <path
                                                        d="M312.069,53.445c-71.26-71.26-187.194-71.26-258.454,0c-71.261,71.26-71.261,187.206,0,258.466 c71.26,71.26,187.194,71.26,258.454,0S383.329,124.705,312.069,53.445z M286.694,286.536 c-57.351,57.34-150.353,57.34-207.704-0.011s-57.351-150.353,0-207.693c57.351-57.351,150.342-57.351,207.693,0 S344.045,229.174,286.694,286.536z">
                                                    </path>
                                                    <path
                                                        d="M101.911,112.531c-29.357,37.725-31.801,89.631-7.321,129.702c1.877,3.087,5.902,4.048,8.978,2.182 c3.065-1.888,4.037-5.903,2.16-8.978c-21.666-35.456-19.506-81.538,6.469-114.876c2.226-2.837,1.713-6.938-1.135-9.154 C108.227,109.193,104.125,109.695,101.911,112.531z">
                                                    </path>
                                                    <path
                                                        d="M498.544,447.722l-132.637-129.2c-7.255-7.07-18.84-6.982-26.008,0.174l-21.033,21.033 c-7.156,7.156-7.234,18.742-0.153,25.986l129.19,132.636c14.346,17.324,35.542,18.35,51.917,1.964 C516.216,483.951,515.857,462.068,498.544,447.722z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        <p class="whitespace-nowrap">Lihat Detail</p>
                                    </button>
                                    <x-modal.show-detail-pengaduan :pengaduan="$item" />
                                    <x-modal.tolak-pengaduan :pengaduan="$item" />
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
        let table = $('#table').DataTable({
            info: false,
            lengthChange: false,
            paging: false,
            language: {
                search: '',
                searchPlaceholder: 'Search...'
            },
            columnDefs: [{
                    className: "dt-center",
                    targets: [0, 1, 2, 3, 4, 5, 6]
                },
                {
                    orderable: false,
                    targets: [5, 6]
                }
            ]
        });
    });
</script>
