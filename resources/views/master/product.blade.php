@extends('app') @section('contents')

<main
    x-data="{ showAdd: false, showEdit: false, showDelete: false }"
    class="flex-1 p-4 transition-all duration-200 ease-in-out"
>
    <div
        class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-4 rounded-lg shadow mb-4"
    >
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between"
        >
            <h2 class="text-2xl font-bold mb-2 md:mb-0">
                {{ $title }}
            </h2>
            <nav class="text-sm" aria-label="Breadcrumb">
                <ol class="list-reset flex text-gray-600 dark:text-gray-300">
                    <li>
                        <a
                            href="{{ route('home') }}"
                            class="hover:underline text-blue-600 dark:text-blue-400"
                            >Home</a
                        >
                    </li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-500 dark:text-gray-400">
                        {{ $title }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div
        class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-2 rounded-lg"
    >
        <div class="my-2 p-4">
            <button
                @click="showAdd = true"
                class="inline-flex items-center gap-2 rounded-md bg-green-600 px-2 py-2 text-white shadow-md transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50"
            >
                <i data-lucide="plus" class="w-5 h-5"></i>
                Tambah
            </button>
        </div>

        <div
            class="bg-white border border-gray-200 dark:border-gray-700 dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-4 rounded-lg"
        >
            <table id="datatable" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Name 1</td>
                        <td>email@gmail.com</td>
                        <td>2025-01-01</td>
                        <td class="flex gap-2">
                            <a
                                href="#"
                                @click.prevent="showEdit = true"
                                class="inline-flex items-center justify-center rounded-md bg-blue-600 p-2 text-white hover:bg-blue-700 transition"
                                title="Update"
                            >
                                <i data-lucide="pen" class="w-4 h-4"></i>
                            </a>
                            <a
                                href="#"
                                @click.prevent="showDelete = true"
                                class="inline-flex items-center justify-center rounded-md bg-red-600 p-2 text-white hover:bg-red-700 transition"
                                title="Delete"
                            >
                                <i data-lucide="trash" class="w-4 h-4"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div
        x-show="showAdd"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-cloak
    >
        <div
            class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg"
            @click.away="showAdd = false"
            @keydown.escape.window="showAdd = false"
        >
            <h2
                class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4"
            >
                Tambah Data
            </h2>
            <form>
                <div class="mb-4">
                    <label
                        for="add-nama"
                        class="block text-gray-700 dark:text-gray-200 mb-1"
                        >Nama</label
                    >
                    <input
                        type="text"
                        id="add-nama"
                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-400"
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="add-email"
                        class="block text-gray-700 dark:text-gray-200 mb-1"
                        >Email</label
                    >
                    <input
                        type="email"
                        id="add-email"
                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-400"
                    />
                </div>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        @click="showAdd = false"
                        class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-white"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 rounded-md bg-green-600 hover:bg-green-700 text-white"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div
        x-show="showEdit"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-cloak
    >
        <div
            class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg"
            @click.away="showEdit = false"
            @keydown.escape.window="showEdit = false"
        >
            <h2
                class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4"
            >
                Edit Data
            </h2>
            <form>
                <div class="mb-4">
                    <label
                        for="edit-nama"
                        class="block text-gray-700 dark:text-gray-200 mb-1"
                        >Nama</label
                    >
                    <input
                        type="text"
                        id="edit-nama"
                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="edit-email"
                        class="block text-gray-700 dark:text-gray-200 mb-1"
                        >Email</label
                    >
                    <input
                        type="email"
                        id="edit-email"
                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        @click="showEdit = false"
                        class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-white"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 rounded-md bg-green-600 hover:bg-green-700 text-white"
                    >
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
    <div
        x-show="showDelete"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-cloak
    >
        <div
            class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg"
            @click.away="showDelete = false"
            @keydown.escape.window="showDelete = false"
        >
            <h2
                class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4"
            >
                Hapus Data
            </h2>
            <p class="text-gray-700 dark:text-gray-300 mb-6">
                Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak
                dapat dibatalkan.
            </p>
            <div class="flex justify-end gap-2">
                <button
                    type="button"
                    @click="showDelete = false"
                    class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-white"
                >
                    Batal
                </button>
                <form method="POST" action="">
                    @csrf @method('DELETE')
                    <button
                        type="submit"
                        class="px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 text-white"
                    >
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
