<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Options'),
    ],
]">

<div class="intro-y flex items-center justify-between mt-8 mb-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ __('Options') }}
    </h2>
</div>

@livewire('admin.options.manage-options')

</x-app-layout>