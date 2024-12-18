@props(['pengaduan'])
<div id="tolak-pengaduan-{{ $pengaduan->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[60] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <div class="flex flex-col text-start">
                    <p class="text-xl font-semibold text-gray-900">
                        Tolak Pengaduan {{ $pengaduan->nomor_pendaftaran }}
                    </p>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="tolak-pengaduan-{{ $pengaduan->id }}"
                    data-modal-target="show-detail-{{ $pengaduan->id }}"
                    data-modal-toggle="show-detail-{{ $pengaduan->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4">
                <form action="{{ route('pengaduan.status') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="respon" value="1">
                    <input type="hidden" name="status" value="false">
                    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
                    <div>
                        <div class="flex flex-col gap-1">
                            <label for="keterangan" class="text-start">Keterangan Ditolak</label>
                            <textarea name="keterangan" id="keterangan" class="text-sm w-full rounded-lg shadow-lg" rows="3"
                                placeholder="Masukkan Keterangan Ditolak" required></textarea>
                        </div>
                    </div>
                    <div class="flex gap-4 w-full justify-end mt-4">
                        <button type="button" data-modal-hide="tolak-pengaduan-{{ $pengaduan->id }}"
                            data-modal-target="show-detail-{{ $pengaduan->id }}"
                            data-modal-toggle="show-detail-{{ $pengaduan->id }}"
                            class="w-1/2 bg-gray-500 rounded-lg shadow-lg text-white py-2 hover:bg-opacity-90 border border-gray-300">
                            Batal
                        </button>
                        <button type="submit"
                            class="w-1/2 bg-green-500 rounded-lg shadow-lg text-white py-2 hover:bg-opacity-90 border border-gray-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
