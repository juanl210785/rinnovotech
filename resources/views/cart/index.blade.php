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
            {{-- Shopping Cart --}}
            <li class="inline-flex items-center text-sm font-semibold text-gray-200 truncate" aria-current="page">
                {{ 'Shopping cart' }}
            </li>
        </ol>
    </x-container>
    <x-container>
        @livewire('cart.shopping-cart')
    </x-container>
</x-client-layout>