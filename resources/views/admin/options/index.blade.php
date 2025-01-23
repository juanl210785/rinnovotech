<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Options'),
    ],
]">

    @livewire('admin.options.manage-options')
</x-app-layout>
