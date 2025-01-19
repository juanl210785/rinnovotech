<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Products'),
        'route' => route('admin.products.index'),
    ],
    [
        'name' => $product->name,
    ],
]">

    @if (session('notification'))
        <x-notification clase="{{ session('notification.clase') }}" lucide="{{ session('notification.lucide') }}">
            <x-slot name="title">
                {{ session('notification.title') }}
            </x-slot>
            {{ session('notification.message') }}
        </x-notification>
    @endif

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Edit Product') }}</h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <div class="intro-y col-span-11 2xl:col-span-9">

            @livewire('admin.products.products-edit', ['product' => $product])

            {{-- Aqui va la parte 1 --}}
        </div>

        {{-- Aqui va parte 2 --}}
    </div>

</x-app-layout>
