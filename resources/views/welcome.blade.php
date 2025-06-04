<x-layouts.main>
    <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "dotsItemClasses": "hs-carousel-active:bg-red-400 hs-carousel-active:border-red-400 size-3 border border-gray-400 rounded-full cursor-pointer",
            "isAutoPlay": true
          }'
        class="relative">
        <div class="hs-carousel relative overflow-hidden w-full min-h-96 bg-white rounded-lg">
            <div
                class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                <div class="hs-carousel-slide">
                    <img src="{{ asset('assets/images/carousel/1.jpg') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <div class="hs-carousel-slide">
                    <img src="{{ asset('assets/images/carousel/2.jpg') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <div class="hs-carousel-slide">
                    <img src="{{ asset('assets/images/carousel/3.jpg') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <button type="button"
            class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-11.5 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-s-lg">
            <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
            </span>
            <span class="sr-only">Previous</span>
        </button>
        <button type="button"
            class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-11.5 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-e-lg">
            <span class="sr-only">Next</span>
            <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </span>
        </button>

        <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 gap-x-2"></div>
    </div>

    <!-- Welcome Section -->
    <div class="max-w-[85rem] mx-auto px-4 py-12">
        <div class="grid md:grid-cols-7 gap-8 items-center">
            <div class="col-span-3">
                <div class="border-l-4 border-red-500 pl-4 mb-4">
                    <h2 class="text-3xl font-bold text-gray-800">Selamat Datang</h2>
                </div>
                <p class="text-lg text-gray-600 mb-6">Selamat datang di {{ config('app.alt_name') }}. Dengan
                    platform
                    ini, Anda dapat mengajukan berbagai keperluan surat akademik secara online dengan mudah, cepat,
                    dan
                    efisien.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button onclick="location.href='{{ route('layanan') }}'"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition-colors">
                        Ajukan Surat Sekarang
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    <button onclick="location.href='{{ route('surat') }}'"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 transition-colors">
                        Cek Surat
                    </button>
                </div>
            </div>
            <div class="col-span-4">
                <img src="{{ asset('assets/images/home-1.svg') }}" alt="Ilustrasi Layanan Surat" class="w-1/2 mx-auto">
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-50 py-12 rounded-lg">
        <div class="max-w-[85rem] mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ config('app.alt_name') }}</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Platform layanan akademik yang memudahkan
                    proses administratif untuk mahasiswa.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="text-red-500 bg-red-100 p-3 rounded-lg w-12 h-12 flex items-center justify-center mb-4">
                        <i data-lucide="file"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pengajuan Online</h3>
                    <p class="text-gray-600">Ajukan berbagai jenis surat akademik secara online kapan saja dan dimana
                        saja.</p>
                </div>

                <!-- Feature 2 -->

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="text-red-500 bg-red-100 p-3 rounded-lg w-12 h-12 flex items-center justify-center mb-4">
                        <i data-lucide="newspaper"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Informasi Terbaru</h3>
                    <p class="text-gray-600">Tidak perlu khawatir ketinggalan tentang informasi terbaru akademik.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="text-red-500 bg-red-100 p-3 rounded-lg w-12 h-12 flex items-center justify-center mb-4">
                        <i data-lucide="check"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Verifikasi Digital</h3>
                    <p class="text-gray-600">Verifikasi keaslian surat dengan sistem QR code
                        unik.
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-layouts.main>
