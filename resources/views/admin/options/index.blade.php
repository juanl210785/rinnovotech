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

    @livewire('admin.options.manage-options')
</x-app-layout>
