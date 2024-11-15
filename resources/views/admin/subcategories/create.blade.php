<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Subcategories'),
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => __('Create'),
    ],
]">

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            Crear una nueva subcategoría de producto
        </h2>
    </div>


    <div class="box intro-y p-8">
        @livewire('admin.subcategories.subcategory-create')
    </div>
</x-app-layout>
