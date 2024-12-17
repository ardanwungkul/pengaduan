<x-guest-layout>
    <div class="max-w-5xl mx-auto p-10 space-y-10">
        <div class="bg-white rounded-lg w-full p-10 shadow-lg">
            <p class="text-lg font-semibold text-center">Layanan Lacak Pengaduan</p>
            <p class="text-xs text-gray-500 text-center">Masukkan Nomor Registrasi Pengaduan di sini.</p>
            <form action="{{ route('laporan.track.search') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <fieldset
                    class="flex justify-between items-end mt-5 w-full text-sm gap-4 border pt-5 border-dashed shadow p-5 rounded-lg bg-gray-50">
                    <div class="flex flex-col gap-1 w-full">
                        <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
                        <input type="text" name="nomor_pendaftaran" id="nomor_pendaftaran" required
                            placeholder="Masukkan Nomor Pendaftaran" :value="old('nomor_pendaftaran')"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <button
                        class="bg-watercouse-600 text-white px-5 py-2 rounded-lg shadow-lg text-sm whitespace-nowrap h-[37.33px]">Lacak
                        Pengaduan</button>
                </fieldset>
            </form>
        </div>
        @if (session('pengaduan'))
            <div class="bg-white rounded-lg w-full p-10 shadow-lg text-sm space-y-10">
                <fieldset class="border border-gray-300 shadow-lg rounded-lg p-4 bg-gray-50">
                    <legend class="px-3">Identitas Pelapor</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1 items-start">
                            <p>Nama Lengkap</p>
                            <input type="text" disabled value="{{ session('pengaduan')->nama }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>
                        <div class="flex flex-col gap-1 items-start">
                            <p>Email</p>
                            <input type="text" disabled value="{{ session('pengaduan')->email }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>
                        <div class="flex flex-col gap-1 items-start">
                            <p>Nomor Hp</p>
                            <input type="text" disabled value="{{ session('pengaduan')->telepon }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>
                        <div class="flex flex-col gap-1 items-start">
                            <p>Kategori Pelapor</p>
                            <input type="text" disabled
                                value="{{ session('pengaduan')->kategori->nama_kategori }} {{ session('pengaduan')->instansi ? '(' . session('pengaduan')->instansi->nama . ')' : '' }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>
                        <div class="flex flex-col gap-1 items-start col-span-2">
                            <p>Alamat</p>
                            <textarea disabled class="text-sm w-full rounded-lg shadow-lg border-gray-300">{{ session('pengaduan')->alamat }}</textarea>
                        </div>
                        <div class="col-span-2 flex justify-center">
                            <a href="/storage/images/{{ session('pengaduan')->nomor_pendaftaran }}/{{ session('pengaduan')->ktp }}"
                                target="blank"
                                class="cursor-pointer flex flex-col gap-1 items-center justify-center group">
                                <svg class="fill-blue-500 w-10 group-hover:fill-blue-600"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"
                                    enable-background="new 0 0 52 52" xml:space="preserve">
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path
                                                d="M46,8H34.9c0,0,0.1,0.7,0.1,1c0,3.9-3.1,7-7,7h-6c-3.9,0-7-3.1-7-7c0-0.3,0-1,0.1-1H6c-2.2,0-4,1.8-4,4v30 c0,2.2,1.8,4,4,4h40c2.2,0,4-1.8,4-4V12C50,9.8,48.2,8,46,8z M21.7,38H16h-5.7C9,38,8,36.8,8,35.5c0-2,2.1-3.1,4.3-4 c1.5-0.6,1.7-1.2,1.7-1.9c0-0.6-0.4-1.2-0.9-1.7c-0.9-0.8-1.4-2-1.4-3.3c0-2.5,1.5-4.6,4.2-4.6s4.2,2.1,4.2,4.6 c0,1.3-0.5,2.5-1.4,3.3c-0.5,0.5-0.9,1.1-0.9,1.7c0,0.6,0.2,1.2,1.7,1.9c2.2,0.9,4.3,2,4.3,4C24,36.8,23,38,21.7,38z M44,34 c0,0.6-0.4,1-1,1H29c-0.6,0-1-0.4-1-1v-2c0-0.6,0.4-1,1-1h14c0.6,0,1,0.4,1,1V34z M46,26c0,0.6-0.4,1-1,1H29c-0.6,0-1-0.4-1-1v-2 c0-0.6,0.4-1,1-1h16c0.6,0,1,0.4,1,1V26z">
                                            </path>
                                            <path
                                                d="M22,12h6c1.7,0,3-1.3,3-3s-1.3-3-3-3h-6c-1.7,0-3,1.3-3,3S20.3,12,22,12z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <p class="group-hover:text-blue-500">Lihat Kartu Tanda Penduduk</p>
                            </a>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="border border-gray-300 shadow-lg rounded-lg p-4 bg-gray-50">
                    <legend class="px-3">Laporan</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1 items-start col-span-2">
                            <p>Jenis Pengaduan</p>
                            <input type="text" disabled
                                value="{{ session('pengaduan')->jenis_pengaduan ? session('pengaduan')->jenis_pengaduan->nama_jenis : null }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300 capitalize">
                        </div>
                        <div class="flex flex-col gap-1 items-start col-span-2">
                            <p>Lokasi Kejadian</p>
                            <input type="text" disabled value="{{ session('pengaduan')->lokasi_kejadian }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>
                        <div class="flex flex-col gap-1 items-start">
                            <p>Tanggal Kejadian</p>
                            <input type="date" disabled value="{{ session('pengaduan')->tanggal_kejadian }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>
                        <div class="flex flex-col gap-1 items-start">
                            <p>Tanggal Pelaporan</p>
                            <input type="text" disabled value="{{ session('pengaduan')->tanggal_kejadian }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>

                        <div class="flex flex-col gap-1 items-start col-span-2">
                            <p>Kronologi</p>
                            <textarea disabled class="text-sm w-full rounded-lg shadow-lg border-gray-300">{{ session('pengaduan')->kronologi }}</textarea>
                        </div>
                        <div class="flex flex-col gap-1 items-start col-span-2">
                            <p>Status</p>
                            <input type="text" disabled value="{{ session('pengaduan')->status }}"
                                class="text-sm w-full rounded-lg shadow-lg border-gray-300">
                        </div>
                        @if (session('pengaduan')->status == 'Ditolak')
                            <div class="flex flex-col gap-1 items-start col-span-2">
                                <p>Keterangan Ditolak</p>
                                <textarea disabled class="text-sm w-full rounded-lg shadow-lg border-gray-300">{{ session('pengaduan')->keterangan_ditolak }}</textarea>
                            </div>
                        @endif
                        <div class="col-span-2 flex justify-center">
                            <a href="/storage/images/{{ session('pengaduan')->nomor_pendaftaran }}/{{ session('pengaduan')->dokumen }}"
                                target="blank"
                                class="cursor-pointer flex flex-col gap-1 items-center justify-center group">
                                <svg viewBox="0 0 24 24" class="fill-blue-500 w-10 group-hover:fill-blue-600"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.29289 1.29289C9.48043 1.10536 9.73478 1 10 1H18C19.6569 1 21 2.34315 21 4V20C21 21.6569 19.6569 23 18 23H6C4.34315 23 3 21.6569 3 20V8C3 7.73478 3.10536 7.48043 3.29289 7.29289L9.29289 1.29289ZM18 3H11V8C11 8.55228 10.5523 9 10 9H5V20C5 20.5523 5.44772 21 6 21H18C18.5523 21 19 20.5523 19 20V4C19 3.44772 18.5523 3 18 3ZM6.41421 7H9V4.41421L6.41421 7ZM7 13C7 12.4477 7.44772 12 8 12H16C16.5523 12 17 12.4477 17 13C17 13.5523 16.5523 14 16 14H8C7.44772 14 7 13.5523 7 13ZM7 17C7 16.4477 7.44772 16 8 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H8C7.44772 18 7 17.5523 7 17Z">
                                        </path>
                                    </g>
                                </svg>
                                <p class="group-hover:text-blue-500">Lihat Dokumen Pendukung</p>
                            </a>
                        </div>
                    </div>
                </fieldset>
            </div>
        @endif
    </div>
</x-guest-layout>
