<x-layouts.dashboard title="Persyaratan Berkas {{ config('layanan')[$layanan]['label'] }}">
    <div class="card">
        <div class="flex justify-end mb-4">
            <button type="button"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal"
                data-hs-overlay="#hs-scale-animation-modal">
                Tambah
            </button>
        </div>


        <div id="hs-scale-animation-modal"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
            <div
                class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                <div
                    class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                        <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800">
                            Form Persyaratan Berkas
                        </h3>
                        <button type="button"
                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('staf.layanan.berkas.store', $layanan) }}" method="post" autocomplete="off">
                        @csrf
                        <div class="p-4 overflow-y-auto">
                            <div class="mb-3">
                                <label for="namaInput" class="block text-sm font-medium mb-2">Nama Berkas</label>
                                <input type="text" id="namaInput" name="nama"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="block text-sm font-medium mb-2">Keterangan</label>
                                <textarea id="keterangan" name="keterangan"
                                    class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-scale-animation-modal">
                                Tutup
                            </button>
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="md:grid grid-cols-8 gap-4">
            <div class="col-span-3">
                <div class="bg-blue-100 border border-blue-200 text-gray-800 rounded-lg p-4 mb-4" role="alert"
                    tabindex="-1" aria-labelledby="hs-actions-label">
                    <div class="flex">
                        <div class="shrink-0">
                            <svg class="shrink-0 size-4 mt-1" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                        </div>
                        <div class="ms-3">
                            <h3 id="hs-actions-label" class="font-semibold">
                                Berkas {{ config('layanan')[$layanan]['label'] }}
                            </h3>
                            <div class="mt-2 text-sm text-gray-600">
                                <p class="mb-2">
                                    Halaman ini digunakan untuk mengelola persyaratan berkas yang akan diisi oleh
                                    mahasiswa ketika ingin menggunakan layanan ini. Di halaman ini, dapat menambah
                                    atau menghapus persyaratan berkas yang dibutuhkan.
                                </p>
                                <p class="mb-2">
                                    Jika ingin menambahkan persyaratan berkas, maka dapat mengklik tombol
                                    "Tambah" yang terletak di sebelah kanan atas halaman ini. Setelah itu, akan
                                    diarahkan ke halaman form untuk mengisi data persyaratan berkas yang akan
                                    ditambahkan. Pastikan data yang diinputkan benar dan lengkap, karena data yang
                                    diinputkan saja yang akan tampil pada persyaratan berkas untuk mahasiswa ketika
                                    menggunakan layanan ini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-5">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-10">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Nama Berkas
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Keterangan
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @forelse ($daftarBerkas as $berkas)
                                            <tr class="hover:bg-gray-100">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $berkas->nama }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $berkas->keterangan ?? '-' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                    <form
                                                        action="{{ route('staf.layanan.berkas.destroy', [$layanan, $berkas]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="hover:bg-gray-100">
                                                <td colspan="4"
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600 text-center">
                                                    Tidak ada data berkas
                                                    {{ strtolower(config('layanan')[$layanan]['label']) }}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
