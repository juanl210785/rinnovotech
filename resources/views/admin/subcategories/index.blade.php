<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Subcategories'),
    ],
]">

<div class="intro-y flex items-center justify-between mt-8 mb-8">
    <h2 class="text-lg font-medium mr-auto">
        Subcategorías de productos
    </h2>
    <x-link-button href="{{ route('admin.subcategories.create') }}" class="flex items-center">
        <i data-lucide="plus"></i>
        <span class="ml-1">{{ __('Create') }}</span>
    </x-link-button>
</div>

<div class="box intro-y p-8">

    {{ session('success') }}

    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Nombre</th>
                    <th class="whitespace-nowrap">Categoría</th>
                    <th class="whitespace-nowrap">Familia</th>
                    <th class="whitespace-nowrap">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td class="whitespace-nowrap">{{ $subcategory->id }}</td>
                        <td class="whitespace-nowrap">{{ $subcategory->name }}</td>
                        <td class="whitespace-nowrap">{{ $subcategory->category->name }}</td>
                        <td class="whitespace-nowrap">{{ $subcategory->category->family->name }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('admin.subcategories.edit', $subcategory) }}">{{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- BEGIN: Notification Content -->
    <x-notification-success>
        <x-slot name="title">
            {{ __('Success') }}
        </x-slot>

        {{ session('success') ? __(session('success')) : __('Category created successfully') }}
    </x-notification-success>
    <!-- END: Notification Content -->
    <div class="mt-8">
        {{ $subcategories->links() }}
    </div>
</div>

</x-app-layout>