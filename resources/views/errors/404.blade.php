<x-layouts.main>
    <div class="mt-10 mb-10">
        <img src="{{ asset('assets/images/404.svg') }}" alt="" class="w-1/2 mx-auto">
        <h1 class="text-2xl font-semibold text-center text-gray-800 my-5">
            {{ $exception->getMessage() ?: 'Halaman tidak ditemukan' }}</h1>

        <div class="flex justify-center mt-5">
            <button onclick="window.location.href='{{ route('index') }}'"
                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-200 bg-red-50 text-red-800 shadow-2xs hover:bg-red-50 focus:outline-hidden focus:bg-gray-50">
                <i data-lucide="home" class="w-4 h-4"></i> Beranda
            </button>
        </div>
    </div>
</x-layouts.main>
