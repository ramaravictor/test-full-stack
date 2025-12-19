<x-layout>

    <div class="bg-white border-b border-gray-100 py-6 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-heading">Katalog Resep Masakan </h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <form action="{{ route('resep.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 mb-8">
            <input type="text" name="search" value="{{ request('search') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full md:w-96 p-2.5"
                placeholder="Cari resep...">

            <select name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full md:w-64 p-2.5">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>

            <button type="submit"
                class="text-white bg-brand hover:bg-brand-strong font-medium rounded-lg text-sm px-5 py-2.5 transition">
                Cari
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($reseps as $resep)
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition flex flex-col h-full">

                    <div
                        class="h-48 bg-gray-100 rounded-t-lg overflow-hidden flex items-center justify-center relative group-hover:opacity-90 transition">
                        @if ($resep->image)
                            <img src="{{ asset('storage/' . $resep->image) }}" alt="{{ $resep->name }}"
                                class="w-full h-full object-cover object-center">
                        @else
                            <div class="text-gray-300">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="p-4 flex flex-col grow">
                        <div class="mb-2">
                            <span class="bg-blue-100 text-brand text-xs font-semibold px-2.5 py-0.5 rounded">
                                {{ $resep->category->name }}
                            </span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 line-clamp-2">{{ $resep->nama_resep }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ $resep->bahans->pluck('nama_bahan')->join(', ') }}</p>


                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    <p>Resep tidak ditemukan.</p>
                    <a href="{{ route('resep.index') }}" class="text-brand hover:underline text-sm">Reset Filter</a>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $reseps->links() }}
        </div>
    </div>
</x-layout>
