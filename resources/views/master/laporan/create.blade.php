<x-guest-layout>
    <div class="max-w-5xl mx-auto p-10">
        <div class="bg-white rounded-lg w-full p-10 shadow-lg">
            <p class="text-lg font-semibold">Laporkan Pengaduan Anda Secara Online!</p>
            <p class="text-xs text-gray-500">Harap lengkapi identitas Anda, sertakan detail pengaduan, dan lampirkan
                bukti pendukung. Pengaduan anonim tidak akan diproses.</p>
            <form action="">
                <fieldset
                    class="grid grid-cols-2 mt-10 w-full text-sm gap-4 border pt-5 border-dashed shadow p-5 rounded-lg bg-gray-50">
                    <legend align="center" class="px-5 bg-white font-semibold">Identitas Pelapor</legend>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="">Kategori Pelapor</label>
                        <select name="" id="" required
                            class="rounded-lg shadow-lg text-sm border border-gray-300">
                            <option value="" selected disabled>Pilih kategori Pelapor</option>
                            <option value="">Masyarakat Umum</option>
                            <option value="">Instansi Pemerintah</option>
                            <option value="">Organisasi Perangkat Daerah</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="" id="" required placeholder="Masukkan Nama Lengkap"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Email</label>
                        <input type="email" name="" id="" required
                            placeholder="Masukkan Alamat E-mail"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Nomor Hp</label>
                        <input type="text" name="" id="" required placeholder="Masukkan Nomor Hp"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Kartu Identitas Penduduk</label>
                        <input type="file" name="" id="" required
                            class="rounded-lg shadow-lg text-xs border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="">Alamat</label>
                        <textarea name="" id="" required rows="4"
                            class="rounded-lg shadow-lg text-sm border border-gray-300"></textarea>
                    </div>

                </fieldset>
                <fieldset
                    class="grid grid-cols-2 mt-10 w-full text-sm gap-4 border pt-5 border-dashed shadow p-5 rounded-lg bg-gray-50">
                    <legend align="center" class="px-5 bg-white font-semibold">Laporan</legend>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="">Lokasi Kejadian</label>
                        <input type="text" name="" id="" required
                            placeholder="Masukkan Lokasi Kejadian"
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Tanggal Kejadian</label>
                        <input type="date" name="" id="" required
                            class="rounded-lg shadow-lg text-sm border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Lampiran Pendukung</label>
                        <input type="file" name="" id="" required
                            class="rounded-lg shadow-lg text-xs border border-gray-300" />
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="">Kronologi</label>
                        <textarea name="" id="" required rows="5"
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
