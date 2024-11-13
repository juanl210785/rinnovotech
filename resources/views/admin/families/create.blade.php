<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Families'),
        'route' => route('admin.families.index'),
    ],
    [
        'name' => __('Create'),
    ],
]">

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            Crear una nueva familia de producto
        </h2>
    </div>
    <div class="box intro-y p-8">
        <form action="{{ route('admin.families.store') }}" method="POST">
            @csrf
            <div>
                <x-input-label for="regular-form-1" class="form-label">Nombre de la Familia</x-input-label>
                <x-text-input id="regular-form-1" name="name" type="text" value="{{ old('name') }}"
                    class="form-control" required />
            </div>

            <div class="mt-2 flex justify-end">
                <x-button-submit>
                    {{ __('Create') }}
                </x-button-submit>
            </div>
        </form>
    </div>
</x-app-layout>
