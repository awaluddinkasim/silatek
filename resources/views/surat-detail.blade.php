<x-layouts.main>
    <div class="card">
        <div class="md:grid grid-cols-2 gap-4 items-center">
            <div class="hidden md:block">
                <img src="{{ asset('assets/images/cek-surat.svg') }}" alt="" class="w-2/3 mx-auto">
            </div>
            <div class="p-6">
                {{-- Informasi Surat --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <h2 class="text-lg font-medium text-gray-700">Informasi Surat</h2>
                            <div class="mt-3 border-t border-gray-200 pt-3">
                                <div class="grid grid-cols-1 gap-3">
                                    @if (config('layanan')[$pengajuan->layanan]['tipe'] == 'seminar-ta')
                                        <div class="flex flex-col">
                                            <span class="text-sm text-gray-500">Nomor Surat Keputusan</span>
                                            <span class="font-medium">{{ $surat->nomor_sk }}</span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm text-gray-500">Nomor Surat Undangan</span>
                                            <span class="font-medium">{{ $surat->nomor_undangan }}</span>
                                        </div>
                                    @else
                                        <div class="flex flex-col">
                                            <span class="text-sm text-gray-500">Nomor Surat</span>
                                            <span class="font-medium">{{ $surat->nomor }}</span>
                                        </div>
                                    @endif

                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-500">Jenis Layanan</span>
                                        <span
                                            class="font-medium">{{ config('layanan')[$pengajuan->layanan]['label'] }}</span>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-500">Tanggal Surat</span>
                                        <span class="font-medium">{{ tanggal($surat->tanggal_surat) }}</span>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-500">Tanggal Disetujui</span>
                                        <span class="font-medium">{{ tanggal($surat->created_at) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h2 class="text-lg font-medium text-gray-700">Informasi Mahasiswa</h2>
                            <div class="mt-3 border-t border-gray-200 pt-3">
                                <div class="grid grid-cols-1 gap-3">
                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-500">NIM</span>
                                        <span class="font-medium">{{ $pengajuan->nim }}</span>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-500">Nama</span>
                                        <span class="font-medium">{{ $pengajuan->nama }}</span>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-500">Program Studi</span>
                                        <span class="font-medium">{{ $pengajuan->prodi }}</span>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-500">Angkatan</span>
                                        <span class="font-medium">{{ $pengajuan->angkatan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Informasi Penandatangan --}}
                <div class="mt-6">
                    <h2 class="text-lg font-medium text-gray-700">Informasi Penandatangan</h2>
                    <div class="mt-3 border-t border-gray-200 pt-3">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-500">Nama Penandatangan</span>
                                <span class="font-medium">{{ $surat->ttd->nama ?? '-' }}</span>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-sm text-gray-500">NUPTK Penandatangan</span>
                                <span class="font-medium">{{ $surat->ttd->nuptk ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
