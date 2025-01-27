<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Options'),
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

    <x-notification clase="text-success" lucide="text-success">
        <x-slot name="title">
            Éxito
        </x-slot>
        ¡Valor ha sido creado!
    </x-notification>

    @livewire('admin.options.manage-options')
</x-app-layout>
