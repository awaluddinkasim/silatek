@push('scripts')
    <script type="module">
        new DataTable('#myTable', {
            ordering: false,
        })
    </script>
@endpush

<x-layouts.dashboard title="Program Studi">
    <div class="md:grid grid-cols-2 gap-8">

        <div class="hidden lg:flex items-center justify-center">
            <img src="{{ asset('assets/images/prodi.svg') }}" alt="" class="w-2/3">
        </div>
        <div class="mb-3">

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
                                    Form Program Studi
                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                    aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <form action="{{ route('admin.prodi.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="p-4 overflow-y-auto">
                                    <div class="mb-3">
                                        <label for="namaInput" class="block text-sm font-medium mb-2">Nama
                                            Program Studi</label>
                                        <input type="text" id="namaInput" name="nama"
                                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            required>
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

                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Program Studi</th>
                            <th>Jumlah Mahasiswa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarProdi as $prodi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prodi->nama }}</td>
                                <td>{{ number_format($prodi->mahasiswa->count()) }}</td>
                                <td>
                                    <form action="{{ route('admin.prodi.destroy', $prodi->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
