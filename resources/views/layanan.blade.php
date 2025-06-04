<x-layouts.main>
    <div class="md:grid grid-cols-8 gap-4">
        <div class="col-span-3">
            <h1 class="text-xl font-semibold text-gray-800 mb-4">Daftar Layanan</h1>
            @forelse ($daftarLayanan as $key => $layanan)
                <div class="card cursor-pointer mb-2" onclick="location.href='{{ route('pengajuan', $key) }}'">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $layanan['label'] }}</h2>
                    <span class="text-gray-600 text-sm">{{ $layanan['deskripsi'] }}</span>
                </div>
            @empty
                <div class="card">
                    <h2 class="text-xl font-semibold text-gray-800">Belum ada layanan yang tersedia</h2>
                    <span class="text-gray-600 text-sm">Harap menunggu hingga layanan tersedia</span>
                </div>
            @endforelse
        </div>
        <div class="col-span-5 hidden md:block">
            <img src="{{ asset('assets/images/layanan.svg') }}" alt="" class="w-2/3 mx-auto">
        </div>
    </div>
</x-layouts.main>
