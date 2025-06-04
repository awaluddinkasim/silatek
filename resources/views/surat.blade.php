<x-layouts.main>
    <form action="" class="relative flex rounded-lg mb-4" autocomplete="off">
        <input type="text" id="hs-trailing-button-add-on-with-icon-and-button" name="nomor"
            placeholder="Masukkan nomor surat"
            class="py-2.5 sm:py-3 px-4 ps-11 block w-full border border-gray-200 rounded-s-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
            required>
        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
            <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
        </div>
        <button type="submit"
            class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-red-400 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">Cari</button>
    </form>

    <div class="h-128 flex place-content-center">
        <img src="{{ asset('assets/images/search.svg') }}" alt="" class="w-1/2 md:w-1/3 mx-auto">
    </div>
</x-layouts.main>
