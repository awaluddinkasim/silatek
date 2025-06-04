<x-layouts.main>
    <div class="md:grid grid-cols-2 gap-8 @if (empty($daftarPengumuman)) items-center @endif">
        <div>
            <h1 class="text-xl font-semibold text-gray-800 mb-4">Pengumuman</h1>
            @forelse ($daftarPengumuman as $pengumuman)
                <div class="bg-white rounded-lg shadow px-6 py-4 my-3">
                    <div class="flex items-center justify-between">
                        <h5 class="text-lg font-semibold">{{ $pengumuman->judul }}</h5>
                        <h6 class="text-sm text-gray-600">{{ tanggal($pengumuman->created_at) }}</h6>
                    </div>
                    <p class="mt-2 text-gray-700 card-text" id="informasi{{ $pengumuman->id }}">
                        {{ $pengumuman->konten }}</p>
                    @if (Str::length($pengumuman->konten) > 201)
                        <span class="text-blue-500 underline cursor-pointer" id="toggle{{ $loop->index }}"
                            onclick="toggleRead('#informasi{{ $pengumuman->id }}', {{ $loop->index }})">Lihat
                            selengkapnya</span>
                    @endif
                </div>
            @empty
                <div class="bg-white rounded-lg shadow px-6 py-4 mb-5">
                    <div class="flex items-center justify-center py-5">
                        <div class="text-center">
                            <div class="text-lg">Belum ada pengumuman apapun</div>
                            <span class="text-sm text-gray-600">Silahkan kembali lagi nanti</span>
                        </div>
                    </div>
                </div>
            @endforelse

            @if ($daftarPengumuman->hasPages())
                <div class="card">
                    {{ $daftarPengumuman->links() }}
                </div>
            @endif
        </div>


        <div class="hidden lg:flex items-center justify-center">
            <img src="{{ asset('assets/images/pengumuman.svg') }}" alt="" class="w-2/3">
        </div>
    </div>
</x-layouts.main>
