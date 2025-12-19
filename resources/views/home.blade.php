<x-layout>

    <section class="flex items-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 justify-center min-h-[80vh]">
        <div class="py-8 px-4 mx-auto max-w-screen-2xl text-center lg:py-16">
            <h1 class="mb-6 text-4xl font-bold tracking-tighter text-heading md:text-5xl lg:text-6xl">
                Selamat Datang di Aplikasi Pengelolaan Resep Kuliner
            </h1>
            <p class="mb-8 text-base font-normal text-body md:text-xl">
                Temukan berbagai resep masakan lezat dan mudah di sini untuk memuaskan selera Anda!
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 md:space-x-4">
                {{-- <button type="button"
                    class="inline-flex items-center justify-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium rounded-base text-base px-5 py-3 focus:outline-none">
                    Cari Resep
                </button> --}}
                <a href="{{ route('resep.index') }}"
                    class="inline-flex items-center justify-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium rounded-base text-base px-5 py-3 focus:outline-none">
                    Lihat Katalog Resep
                </a>
            </div>
        </div>
    </section>

</x-layout>
