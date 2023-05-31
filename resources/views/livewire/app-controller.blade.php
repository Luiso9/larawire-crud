<div class="container mx-auto">

    <!-- Search Input -->
    <div class='max-w-md mx-auto'>
        <div
            class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-base-300 overflow-hidden">
            <div class="grid place-items-center h-full w-12 text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <input class="peer h-full w-full outline-none text-sm bg-base-300 text-white pr-2" type="text"
                id="search" wire:model="search" placeholder="Cari sesuatu..." />
        </div>
    </div>

    <!-- Tombol Tambah -->
    <div class="shadow-xl">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold mt-6 mb-4 py-2 px-4 rounded float-right"
            wire:click="showModalForm">Tambah Data</button>
    </div>

    <!-- Tampilkan data -->
    <div class="content-center">
        <table class="table min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th>Index</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-gray-500 divide-y divide-gray-200">
                @foreach ($data as $item)
                    <tr class="hover">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->genre }}</td>
                        <td><button class="btn btn-sm rounded bg-blue-400 hover:bg-blue-500 text-white"
                                wire:click="edit({{ $item->id }})">Edit</button>
                            <button class="btn btn-sm rounded bg-red-400 hover:bg-red-500 text-white"
                                wire:click="delete({{ $item->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah/Edit Data -->
    @if ($modalFormVisible)
        <div class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur-sm">
            <div class="bg-base-300 rounded-lg p-4 shadow-md">
                <form wire:submit.prevent="create">
                    <!-- Tampilkan input dan tombol submit -->
                    <div class="mb-4">
                        <label for="judul" class="block text-white font-bold mb-2">Judul</label>
                        <input type="text" wire:model="judul" id="judul"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                        <label for="genre" class="block text-white font-bold mb-2">Genre</label>
                        <input type="text" wire:model="genre" id="genre"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                        @error('judul')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tambahkan input dan validasi sesuai dengan kolom yang ada di tabel -->

                    <div class="flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2"
                            type="submit">Simpan</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                            type="button" wire:click="hideModalForm">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{ $data->links('livewire::simple-tailwind') }}
</div>
