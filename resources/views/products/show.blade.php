<x-client-layout>
    <x-container class="px-4 my-4">
        <ol class="flex items-center whitespace-nowrap intro-y">
            {{-- Home --}}
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-white hover:text-emerald-600 focus:outline-hidden focus:text-emerald-600"
                    href="/">
                    <svg class="shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    {{ __('Home') }}
                </a>
                <svg class="shrink-0 mx-2 size-4 text-gray-200" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </li>
            {{-- Familia --}}
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-white hover:text-emerald-600 focus:outline-hidden focus:text-emerald-600"
                    href="{{ route('families.show', $product->subcategory->category->family) }}">
                    <svg class="shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="7" height="7" x="14" y="3" rx="1"></rect>
                        <path
                            d="M10 21V8a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H3">
                        </path>
                    </svg>
                    {{ $product->subcategory->category->family->name }}
                    <svg class="shrink-0 mx-2 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </li>
            {{-- Categoria --}}
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-white hover:text-emerald-600 focus:outline-hidden focus:text-emerald-600"
                    href="{{ route('categories.show', $product->subcategory->category) }}">
                    <svg class="shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="7" height="7" x="14" y="3" rx="1"></rect>
                        <path
                            d="M10 21V8a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H3">
                        </path>
                    </svg>
                    {{ $product->subcategory->category->name }}
                    <svg class="shrink-0 mx-2 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </li>
            {{-- Subcategoria --}}
            <li class="inline-flex items-center text-sm font-semibold text-gray-200 truncate" aria-current="page">
                {{ $product->subcategory->name }}
            </li>
        </ol>
    </x-container>

    @if ($product->variants->count())
        @livewire('products.add-to-cart-variants', ['product' => $product])
    @else
        @livewire('products.add-to-cart', ['product' => $product])
    @endif
</x-client-layout>
