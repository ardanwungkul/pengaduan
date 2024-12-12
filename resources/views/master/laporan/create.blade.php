<x-guest-layout>
    <div class="max-w-5xl mx-auto p-10">
        <div class="bg-white rounded-lg w-full p-10 shadow-lg">
            <p class="text-lg font-semibold">Laporkan Pengaduan Anda Secara Online!</p>
            <p class="text-xs text-gray-500">Harap lengkapi identitas Anda, sertakan detail pengaduan, dan lampirkan
                bukti pendukung. Pengaduan anonim tidak akan diproses.</p>
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
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
                    <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : null }}">
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
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="lokasi_kejadian">Lokasi Kejadian</label>
                        <input type="text" name="lokasi_kejadian" id="lokasi_kejadian" required
                            placeholder="Masukkan Lokasi Kejadian"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" id="tanggal_kejadian" required
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
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
