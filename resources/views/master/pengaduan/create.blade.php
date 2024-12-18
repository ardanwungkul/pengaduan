<x-guest-layout>
    <div class="max-w-5xl mx-auto p-10">
        @if (session('nomor_pendaftaran'))
            <div id="success-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Pengaduan Anda Telah Terkirim
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="success-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 space-y-4">
                            <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                Sebagai bukti atas registrasi pengaduan anda, silahkan download file tanda bukti
                                registrasi
                                pada link di bawah ini.
                            </p>
                            <div class="flex justify-center">
                                <button
                                    onclick="downloadFile('{{ route('laporan.download.registrasi', session('nomor_pendaftaran')) }}')"
                                    class="bg-watercouse-600 hover:bg-opacity-90 text-white rounded-lg px-5 py-1 flex items-center justify-center gap-3">
                                    <svg viewBox="0 0 24 24" class="fill-white h-6" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M5.625 15C5.625 14.5858 5.28921 14.25 4.875 14.25C4.46079 14.25 4.125 14.5858 4.125 15H5.625ZM4.875 16H4.125H4.875ZM19.275 15C19.275 14.5858 18.9392 14.25 18.525 14.25C18.1108 14.25 17.775 14.5858 17.775 15H19.275ZM11.1086 15.5387C10.8539 15.8653 10.9121 16.3366 11.2387 16.5914C11.5653 16.8461 12.0366 16.7879 12.2914 16.4613L11.1086 15.5387ZM16.1914 11.4613C16.4461 11.1347 16.3879 10.6634 16.0613 10.4086C15.7347 10.1539 15.2634 10.2121 15.0086 10.5387L16.1914 11.4613ZM11.1086 16.4613C11.3634 16.7879 11.8347 16.8461 12.1613 16.5914C12.4879 16.3366 12.5461 15.8653 12.2914 15.5387L11.1086 16.4613ZM8.39138 10.5387C8.13662 10.2121 7.66533 10.1539 7.33873 10.4086C7.01212 10.6634 6.95387 11.1347 7.20862 11.4613L8.39138 10.5387ZM10.95 16C10.95 16.4142 11.2858 16.75 11.7 16.75C12.1142 16.75 12.45 16.4142 12.45 16H10.95ZM12.45 5C12.45 4.58579 12.1142 4.25 11.7 4.25C11.2858 4.25 10.95 4.58579 10.95 5H12.45ZM4.125 15V16H5.625V15H4.125ZM4.125 16C4.125 18.0531 5.75257 19.75 7.8 19.75V18.25C6.61657 18.25 5.625 17.2607 5.625 16H4.125ZM7.8 19.75H15.6V18.25H7.8V19.75ZM15.6 19.75C17.6474 19.75 19.275 18.0531 19.275 16H17.775C17.775 17.2607 16.7834 18.25 15.6 18.25V19.75ZM19.275 16V15H17.775V16H19.275ZM12.2914 16.4613L16.1914 11.4613L15.0086 10.5387L11.1086 15.5387L12.2914 16.4613ZM12.2914 15.5387L8.39138 10.5387L7.20862 11.4613L11.1086 16.4613L12.2914 15.5387ZM12.45 16V5H10.95V16H12.45Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <p>
                                        Download Tanda Bukti Registrasi
                                    </p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-lg w-full p-10 shadow-lg">
            <p class="text-lg font-semibold">Laporkan Pengaduan Anda Secara Online!</p>
            <p class="text-xs text-gray-500">Harap lengkapi identitas Anda, sertakan detail pengaduan, dan lampirkan
                bukti pendukung. Pengaduan anonim tidak akan diproses.</p>
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : null }}">
                @csrf
                @method('POST')
                <fieldset
                    class="grid grid-cols-2 mt-10 w-full text-sm gap-4 border pt-5 border-dashed shadow p-5 rounded-lg bg-gray-50">
                    <legend align="center" class="px-5 bg-white font-semibold">Identitas Pelapor</legend>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="kategori_id">Kategori Pelapor</label>
                        <select name="kategori_id" id="kategori_id" required
                            class="rounded-lg shadow-lg text-sm border border-gray-300">
                            <option value="" selected disabled>Pilih kategori Pelapor</option>
                            @foreach ($kategori_pelapor as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($kategori_pelapor as $item)
                        @if ($item->instansi->count() > 0)
                            <div class="hidden kategori_instansi col-span-2" data-id="{{ $item->id }}">
                                <div class="flex flex-col gap-1">
                                    <label for="kategori_instansi_id_{{ $item->id }}">Kategori Instansi</label>
                                    <select name="kategori_instansi_id_{{ $item->id }}"
                                        id="kategori_instansi_id_{{ $item->id }}"
                                        class="rounded-lg shadow-lg text-sm border border-gray-300">
                                        <option value="" selected disabled>Pilih kategori Instansi</option>
                                        @foreach ($item->instansi as $instansi)
                                            <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="flex flex-col gap-1">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama Lengkap"
                            value="{{ Auth::user() ? Auth::user()->name : '' }}"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required
                            value="{{ Auth::user() ? Auth::user()->email : '' }}" placeholder="Masukkan Alamat E-mail"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="telepon">Nomor Hp</label>
                        <input type="text" name="telepon" id="telepon" required placeholder="Masukkan Nomor Hp"
                            {{ Auth::user() ? Auth::user()->no_hp : '' }}
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="ktp">Kartu Identitas Penduduk</label>
                        <input type="file" name="ktp" id="ktp" required accept="image/*"
                            class="rounded-lg shadow-lg text-xs border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" required rows="4"
                            class="rounded-lg shadow-lg text-sm border border-gray-300"></textarea>
                    </div>

                </fieldset>
                <fieldset
                    class="grid grid-cols-2 mt-10 w-full text-sm gap-4 border pt-5 border-dashed shadow p-5 rounded-lg bg-gray-50">
                    <legend align="center" class="px-5 bg-white font-semibold">Laporan</legend>
                    @if ($subjek_laporan->count() > 0)
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="subjek_id">Subjek Laporan</label>
                            <select name="subjek_id" id="subjek_id"
                                class="rounded-lg shadow-lg text-sm border border-gray-300">
                                <option value="" selected disabled>Pilih Subjek Laporan</option>
                                @foreach ($subjek_laporan as $item)
                                    <option value="{{ $item->id }}" class="capitalize">{{ $item->nama_subjek }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" id="tanggal_kejadian" required
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="lokasi_kejadian">Lokasi Kejadian</label>
                        <input type="text" name="lokasi_kejadian" id="lokasi_kejadian" required
                            placeholder="Masukkan Lokasi Kejadian"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="dokumen">Lampiran Pendukung</label>
                        <input type="file" name="dokumen" id="dokumen" required
                            class="rounded-lg shadow-lg text-xs border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="kronologi">Kronologi</label>
                        <textarea name="kronologi" id="kronologi" required rows="5"
                            class="rounded-lg shadow-lg text-sm border border-gray-300"></textarea>
                    </div>
                </fieldset>
                <div class="flex justify-end pt-10">
                    <button class="bg-watercouse-600 text-white px-5 py-2 rounded-lg shadow-lg text-sm">Kirim
                        Pengaduan</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
<script type="module">
    $(document).ready(function() {
        $('#kategori_id').on('change', function() {
            var selectedKategoriId = $(this).val();
            $('.kategori_instansi').addClass('hidden');
            $('.kategori_instansi[data-id="' + selectedKategoriId + '"]').removeClass('hidden');
        });
    });

    @if (session('nomor_pendaftaran'))
        const instanceOptions = {
            id: 'success-modal',
            override: true
        };
        const modalOption = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,

        }
        const modal = new Modal(document.getElementById('success-modal'), modalOption, instanceOptions)
        modal.show()
    @endif
</script>
<script>
    async function downloadFile(url) {
        try {
            const response = await fetch(url);

            if (!response.ok) {
                throw new Error('Gagal mengunduh file.');
            }

            const blob = await response.blob();
            const downloadUrl = window.URL.createObjectURL(blob);

            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = 'Nomor Registrasi Pengaduan.pdf';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(downloadUrl);
        } catch (error) {
            console.error('Error:', error);
            alert('Gagal mengunduh file');
        }
    }
</script>
