<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Covers'),
        'route' => route('admin.covers.index'),
    ],
    [
        'name' => __('Edit'),
    ],
]">

</x-app-layout>
