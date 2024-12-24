@props(['user'])
<div id="edit-pengguna-{{ $user->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[60] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <div class="flex flex-col text-start">
                    <p class="md:text-xl text-lg font-semibold text-gray-900">
                        Edit Pengguna
                    </p>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-pengguna-{{ $user->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-3">
                        <div class="flex flex-col gap-1">
                            <label for="name" class="text-start md:text-sm text-xs">Nama Lengkap</label>
                            <input required type="text" name="name" id="name"
                                class="md:text-sm text-xs w-full rounded-lg shadow-lg"
                                placeholder="Masukkan Nama Lengkap" value="{{ $user->name }}">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="email" class="text-start md:text-sm text-xs">Email</label>
                            <input required type="email" name="email" id="email"
                                class="md:text-sm text-xs w-full rounded-lg shadow-lg"
                                placeholder="Masukkan Alamat Email" value="{{ $user->email }}">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="password" class="text-start md:text-sm text-xs">Password</label>
                            <input type="text" name="password" id="password"
                                class="md:text-sm text-xs w-full rounded-lg shadow-lg" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="flex gap-4 w-full justify-end mt-4">
                        <button type="submit"
                            class="bg-green-500 rounded-lg shadow-lg text-white py-1 px-5 hover:bg-opacity-90 border border-gray-300 text-sm">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
