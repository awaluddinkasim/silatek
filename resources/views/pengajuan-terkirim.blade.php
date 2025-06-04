<x-layouts.main>
    <div class="card">
        <img src="{{ asset('assets/images/surat.svg') }}" alt="" class="w-1/4 md:1/2 mx-auto mb-4">

        @if ($pengajuan->surat && $pengajuan->surat->ttd)
            <h1 class="text-xl font-semibold text-gray-800 text-center my-3">Surat pengajuan Anda telah selesai</h1>
            <div class="text-center mb-5">
                @foreach (array_keys(config('layanan')[$layanan]['pdf']) as $pdf)
                    <a href="{{ route('pengajuan.pdf', [$layanan, $pengajuan->uuid]) }}?jenis={{ $pdf }}"
                        target="_blank" class="px-4 py-2 rounded-lg bg-blue-600 text-white inline-block">Buka
                        {{ $pdf }}</a>
                @endforeach
            </div>
        @else
            <h1 class="text-xl font-semibold text-gray-800 text-center my-3">Surat pengajuan Anda sedang dalam proses,
                silahkan kembali lagi nanti</h1>
        @endif
    </div>
</x-layouts.main>
