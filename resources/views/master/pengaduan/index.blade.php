<x-app-layout>
    <x-slot name="header">
        {{ __('Daftar Pengaduan Masuk') }}
    </x-slot>
    @foreach ($pengaduan as $item)
        <x-modal.show-detail-pengaduan :pengaduan="$item" />
        <button data-modal-target="show-detail-{{ $item->id }}" data-modal-toggle="show-detail-{{ $item->id }}"
            class="hidden">
        </button>

        @if ($item->respon_3_status !== null)
            {{-- @if ($item->respon_3_status == true)
            Respon 3 true
        @else
            Respon 3 false
        @endif --}}
        @elseif ($item->respon_2_status !== null)
            {{-- @if ($item->respon_2_status == true)
            <p class="text-green-500">
                Ditindak Lanjuti ke Penelitian
            </p>
        @else
            <p class="text-red-500">
                Tidak Dapat di Tindak Lanjuti
            </p>
        @endif --}}
        @elseif($item->respon_2_status == null && $item->respon_1_status !== null)
            @if ($item->respon_1_status == true)
                <x-modal.tolak-tindak-lanjut :pengaduan="$item" />
            @else
                {{-- <x-modal.tolak-pengaduan :pengaduan="$item" /> --}}
            @endif
        @else
            {{-- <p>
            Belum di Proses
        </p> --}}
            <x-modal.tolak-pengaduan :pengaduan="$item" />
        @endif
    @endforeach
    <div class="p-5 md:pt-16 pt-28 bg-white border border-gray-300 shadow-lg rounded-lg">
        <div class="relative">
            <div class="rounded-lg border border-gray-300 shadow-lg overflow-hidden">
                <table id="table" class="w-full">
                    <thead class="bg-gray-200">
                        <tr class="text-xs">
                            <th class="!font-semibold">Nomor dan Tanggal Pengaduan</th>
                            <th class="!font-semibold">Kategori</th>
                            <th class="!font-semibold">Subjek Laporan</th>
                            <th class="!font-semibold">Nama Pelapor</th>
                            <th class="!font-semibold">Alamat</th>
                            <th class="!font-semibold">Email/Telp</th>
                            <th class="!font-semibold">Tanggal dan Lokasi Kejadian</th>
                            <th class="!font-semibold">Status</th>
                            <th class="!font-semibold">Keterangan</th>
                            <th class="!font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($pengaduan as $item)
                            <tr class="text-xs">
                                <td>
                                    <div>
                                        <button type="button"
                                            class="font-medium cursor-pointer flex gap-1 items-center justify-between group w-full">
                                            <p class="flex-grow">{{ $item->nomor_pendaftaran }}</p>
                                        </button>
                                        <p class="text-gray-600">{{ $item->created_at->format('d M Y H:i') }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>
                                            {{ $item->kategori->nama_kategori }}
                                        </p>
                                        <p class="text-gray-500">
                                            {{ $item->instansi ? '(' . $item->instansi->nama . ')' : null }}
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $item->subjek_laporan ? $item->subjek_laporan->nama_subjek : '' }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->nama }}</p>
                                </td>
                                <td class="!text-start">
                                    <p>{{ $item->alamat }}</p>
                                </td>
                                <td class="!text-start">
                                    <div>
                                        <p>{{ $item->email }}</p>
                                        <p>{{ $item->telepon }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>
                                            {{ \Carbon\Carbon::parse($item->tanggal_kejadian)->format('d M Y') }}
                                        </p>
                                        <p>
                                            {{ $item->lokasi_kejadian }}
                                        </p>
                                    </div>
                                </td>
                                {{-- Status --}}
                                <td>
                                    <div>

                                        @if ($item->respon_3_status !== null)
                                            @if ($item->respon_3_status == true)
                                                Respon 3 true
                                            @else
                                                Respon 3 false
                                            @endif
                                        @elseif ($item->respon_2_status !== null)
                                            @if ($item->respon_2_status == true)
                                                <p class="text-green-500">
                                                    Ditindak Lanjuti ke Penelitian
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse($item->respon_2_tanggal)->format('d M Y h:i') }}
                                                </p>
                                            @else
                                                <p class="text-red-500">
                                                    Tidak Dapat di Tindak Lanjuti
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse($item->respon_2_tanggal)->format('d M Y h:i') }}
                                                </p>
                                            @endif
                                        @elseif($item->respon_2_status == null && $item->respon_1_status !== null)
                                            @if ($item->respon_1_status == true)
                                                <p class="text-green-500">
                                                    Diterima
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse($item->respon_1_tanggal)->format('d M Y h:i') }}
                                                </p>
                                            @else
                                                <p class="text-red-500">
                                                    Ditolak
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse($item->respon_1_tanggal)->format('d M Y h:i') }}
                                                </p>
                                            @endif
                                        @else
                                            <p>
                                                Belum di Proses
                                            </p>
                                        @endif
                                    </div>
                                </td>
                                {{-- Keterangan --}}
                                <td>
                                    <div>
                                        @if ($item->respon_3_status !== null)
                                            @if ($item->respon_3_status == true)
                                                Respon 3 true
                                            @else
                                                Respon 3 false
                                            @endif
                                        @elseif ($item->respon_2_status !== null)
                                            @if ($item->respon_2_status == true)
                                                {{-- <p class="text-green-500">
                                                    Ditindak Lanjuti ke Penelitian
                                                </p> --}}
                                            @else
                                                <p>
                                                    {{ $item->respon_2_keterangan }}
                                                </p>
                                            @endif
                                        @elseif($item->respon_2_status == null && $item->respon_1_status !== null)
                                            @if ($item->respon_1_status == true)
                                                {{-- <p class="text-green-500">
                                                    Diterima
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse($item->respon_1_tanggal)->format('d M Y h:i') }}
                                                </p> --}}
                                            @else
                                                <p>
                                                    {{ $item->respon_1_keterangan }}
                                                </p>
                                            @endif
                                        @else
                                            {{-- <p>
                                                Belum di Proses
                                            </p> --}}
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <button data-modal-id="show-detail-{{ $item->id }}"
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
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($pengaduan as $item)
    @endforeach
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        let table = $('#table').DataTable({
            info: false,
            lengthChange: false,
            paging: false,
            responsive: true,
            language: {
                search: '',
                searchPlaceholder: 'Search...'
            },
            columnDefs: [{
                    className: "dt-center",
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                },
                {
                    orderable: false,
                    targets: [0, 4, 5, 6, 9]
                },
                {
                    visible: false,
                    targets: [2, 4, 5, 8]
                }
            ],
            order: [],
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                text: 'Export Pdf',
                title: 'Daftar Pengaduan Masuk',
                className: '!bg-green-500 !text-white',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                },
                orientation: 'landscape',
                pageSize: 'A4',
                customize: function(doc) {
                    doc.pageMargins = [30, 30, 30, 30];
                    doc.defaultStyle.fontSize = 9;

                    doc.styles.tableHeader = {
                        color: 'black',
                        bold: true,
                        fillColor: '#ddd',
                        fontSize: 9,
                        verticalAlignment: 'middle',
                        alignment: 'center'
                    };
                    doc.styles.tableBodyOdd = {
                        fontSize: 9
                    };
                }
            }]
        });
    });
    $(document).on('click', '[data-modal-id]', function() {
        const modalId = $(this).data('modal-id');
        const hiddenButton = $(`[data-modal-target="${modalId}"]`);
        if (hiddenButton.length) {
            hiddenButton.trigger('click');
        }
    });
</script>
