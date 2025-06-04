@push('scripts')
    <script type="module">
        new DataTable('#myTable', {
            paging: false,
            ordering: false,
            info: false,
        })
    </script>
@endpush

<x-layouts.dashboard title="Surat {{ config('layanan')[$layanan]['label'] }}">
    <div class="card">
        <div class="md:grid grid-cols-2 gap-8">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-5">Data Mahasiswa</h2>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Nama Lengkap</span>
                    <span class="block w-full">
                        {{ $pengajuan->nama }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Nomor Induk Mahasiswa</span>
                    <span class="block w-full">
                        {{ $pengajuan->nim }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Program Studi</span>
                    <span class="block w-full">
                        {{ $pengajuan->prodi }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Angkatan</span>
                    <span class="block w-full">
                        {{ $pengajuan->angkatan }}
                    </span>
                </div>

                <div class="mb-3">
                    <span class="block text-sm font-medium">Nomor Telepon</span>
                    <span class="block w-full">
                        {{ $pengajuan->no_telp }}
                    </span>
                </div>
            </div>
            <div class="mb-4">
                @if ($pengajuan->surat->ttd)

                    <h2 class="text-lg font-semibold text-gray-800 mb-5">Daftar Surat</h2>
                    <div class="mb-5">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>Jenis Surat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (array_keys(config('layanan')[$layanan]['pdf']) as $pdf)
                                    <tr>
                                        <td>{{ ucfirst($pdf) }} {{ config('layanan')[$layanan]['label'] }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('staf.surat.pdf', [$layanan, $pengajuan->uuid]) }}?jenis={{ $pdf }}"
                                                target="_blank" class="text-blue-600 hover:text-blue-900"
                                                target="_blank">Lihat Surat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <img src="{{ asset('assets/images/surat.svg') }}" alt=""
                        class="w-1/4 md:w-1/2 mx-auto mb-4">
                    <h1 class="text-xl font-semibold text-gray-800 text-center my-3">Surat ini sedang menunggu
                        persetujuan
                    </h1>
                    <div class="text-center mb-5">
                        @foreach (array_keys(config('layanan')[$layanan]['pdf']) as $pdf)
                            <a href="{{ route('staf.surat.pdf', [$layanan, $pengajuan->uuid]) }}?jenis={{ $pdf }}"
                                target="_blank" class="px-4 py-2 rounded-lg bg-blue-600 text-white inline-block">Preview
                                {{ $pdf }}</a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.dashboard>
