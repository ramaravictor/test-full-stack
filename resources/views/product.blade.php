<x-layout>

    <div class="bg-white border-b border-gray-100 py-6 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-heading">Katalog Produk</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

        {{-- Search & Filter Section --}}
        <form action="{{ route('products.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 mb-8">
            <input type="text" name="search" value="{{ request('search') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full md:w-96 p-2.5"
                placeholder="Cari produk...">

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

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition flex flex-col h-full">
                    {{-- Product Image --}}
                    <div
                        class="h-48 bg-gray-100 rounded-t-lg overflow-hidden flex items-center justify-center relative group-hover:opacity-90 transition">
                        @if ($product->image)
                            {{-- Jika ada gambar --}}
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover object-center">
                        @else
                            {{-- Jika TIDAK ada gambar (Tampilkan Placeholder SVG) --}}
                            <div class="text-gray-300">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-4 flex flex-col grow">
                        <div class="mb-2">
                            <span class="bg-blue-100 text-brand text-xs font-semibold px-2.5 py-0.5 rounded">
                                {{ $product->category->name }}
                            </span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 line-clamp-2">{{ $product->name }}</h3>
                        <p class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }} mb-4">
                            Stok: {{ $product->stock }}
                        </p>

                        <div class="mt-auto flex justify-between items-center pt-3 border-t border-gray-50">
                            <span class="font-bold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="text-sm text-brand font-medium cursor-pointer hover:underline">Detail
                                &rarr;</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    <p>Produk tidak ditemukan.</p>
                    <a href="{{ route('products.index') }}" class="text-brand hover:underline text-sm">Reset Filter</a>
                </div>
            @endforelse
        </div>


        {{-- Table View (Alternatif) --}}
        <div class="mt-12">
            <h2 class="text-xl font-bold text-heading mb-6">Tabel Produk</h2>

            <div class="relative overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Stok
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr
                                class="odd:bg-white even:bg-gray-50 border-b border-gray-200 hover:bg-gray-100 transition">
                                {{-- Product Name --}}
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $product->name }}
                                </th>

                                {{-- Category --}}
                                <td class="px-6 py-4">
                                    <span class="bg-blue-100 text-brand text-xs font-semibold px-2.5 py-0.5 rounded">
                                        {{ $product->category->name }}
                                    </span>
                                </td>

                                {{-- Stock (Pengganti Color) --}}
                                <td class="px-6 py-4">
                                    <span
                                        class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600 font-bold' }}">
                                        {{ $product->stock }} pcs
                                    </span>
                                </td>

                                {{-- Price --}}
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-brand hover:underline">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <p class="text-base">Produk tidak ditemukan.</p>
                                    <a href="{{ route('products.index') }}"
                                        class="text-brand hover:underline text-sm mt-2 inline-block">Reset Filter</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</x-layout>
