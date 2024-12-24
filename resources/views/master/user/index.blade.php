<x-app-layout>
    <x-slot name="header">
        {{ __('Daftar Pengguna') }}
    </x-slot>
    <div class="p-5 bg-white border border-gray-300 shadow-lg rounded-lg">
        @foreach ($user as $item)
            @if ($item->role !== 'superadmin')
                <button data-modal-target="edit-pengguna-{{ $item->id }}" class="hidden"
                    data-modal-toggle="edit-pengguna-{{ $item->id }}">
                </button>
                <button type="button" data-modal-target="confirm-delete-{{ $item->id }}" class="hidden"
                    data-modal-toggle="confirm-delete-{{ $item->id }}">
                </button>
                <x-modal.confirm-delete :id="$item->id" :name="'Pengguna'" :action="route('users.destroy', $item->id)" />
                <x-modal.edit-pengguna :user="$item" />
            @endif
        @endforeach
        <button type="button" data-modal-target="tambah-pengguna" data-modal-toggle="tambah-pengguna"
            class="bg-green-500 text-white px-5 py-2 rounded-lg shadow-lg text-xs hover:bg-opacity-90 mb-12 md:mb-4">Tambah
            Pengguna</button>
        <x-modal.tambah-pengguna />
        <div class="relative">
            <div class="rounded-lg border border-gray-300 shadow-lg overflow-hidden">
                <table id="table" class="w-full">
                    <thead class="bg-gray-200">
                        <tr class="text-xs">
                            <th class="!font-semibold text-center">Nama</th>
                            <th class="!font-semibold text-center">Email</th>
                            <th class="!font-semibold text-center">Nomor Hp</th>
                            <th class="!font-semibold text-center">Role</th>
                            <th class="!font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($user as $item)
                            <tr class="text-xs">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td class="text-center">
                                    {{ $item->role }}
                                </td>

                                <td>
                                    <div class="flex justify-center items-center gap-3">
                                        @if ($item->role !== 'superadmin')
                                            <button data-modal-id="edit-pengguna-{{ $item->id }}"
                                                class="flex items-center gap-1 bg-blue-500 px-3 py-1 rounded-lg text-white hover:bg-opacity-90 border shadow-lg">
                                                <svg class="fill-white w-5 h-5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                <p class="whitespace-nowrap">Edit</p>
                                            </button>
                                            <button type="button" data-modal-id="confirm-delete-{{ $item->id }}"
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
                                        @endif
                                    </div>
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
            deferRender: true,
            paging: false,
            language: {
                search: '',
                searchPlaceholder: 'Search...'
            },
            responsive: true,
            columnDefs: [{
                    className: "dt-center",
                    targets: [3, 4]
                },
                {
                    orderable: false,
                    targets: [4]
                }
            ]
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
