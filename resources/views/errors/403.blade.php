<x-layouts.main>
    <div class="mt-10 mb-10">
        <img src="{{ asset('assets/images/403.svg') }}" alt="" class="w-1/2 mx-auto">
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-15">
            {{ $exception->getMessage() ?: 'Konten ini tak bisa diakses' }}</h1>
    </div>
</x-layouts.main>
