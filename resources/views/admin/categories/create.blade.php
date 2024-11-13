<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Categories'),
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => __('Create'),
    ],
]">

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            Crear una nueva categoría de producto
        </h2>
    </div>
    <div class="box intro-y p-8">

        <form action="{{ route('admin.categories.store') }}" method="POST" id="create-category-form">
            @csrf
            <div class="mb-4">
                <x-input-label for="regular-form-1" class="form-label">Familia de producto</x-input-label>

                <div>
                    <div class="mt-2">
                        <select id="family_id" data-placeholder="Seleccione la familia" class="tom-select w-full"
                            name="family_id" required>
                            <option value="" selected>Seleccione la familia</option>
                            @foreach ($families as $family)
                                <option value="{{ $family->id }}" @selected(old('family_id') == $family->id)>{{ $family->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <x-input-label for="regular-form-1" class="form-label">Nombre de la Categoría</x-input-label>
                <x-text-input id="name" name="name" type="text" value="{{ old('name') }}"
                    class="form-control" required />
            </div>

            <div class="mt-2 flex justify-end">
                <button type="submit"
                    class="btn btn-primary">{{ __('Create') }}</button>

            </div>
        </form>
    </div>

</x-app-layout>
