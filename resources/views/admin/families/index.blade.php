<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Families'),
    ],
]">
    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            Familias de productos
        </h2>
        <x-link-button href="{{ route('admin.families.create') }}" class="flex items-center">
            <i data-lucide="plus"></i>
            <span class="ml-1">{{ __('Create') }}</span>
        </x-link-button>
    </div>
    <div class="box intro-y p-8">

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Nombre</th>
                        <th class="whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($families as $family)
                        <tr>
                            <td class="whitespace-nowrap">{{ $family->id }}</td>
                            <td class="whitespace-nowrap">{{ $family->name }}</td>
                            <td class="whitespace-nowrap">
                                <a href="{{ route('admin.families.edit', $family) }}">{{ __('Edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8">
            {{ $families->links() }}
        </div>
    </div>

</x-app-layout>
