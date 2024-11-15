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

        <form action="{{ route('admin.subcategories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-input-label for="regular-form-1" class="form-label">Categoría de producto</x-input-label>

                <div>
                    <div class="mt-2">
                        <select id="category_id" data-placeholder="Seleccione una categoría" class="tom-select w-full"
                            name="category_id" required>
                            <option value="" selected>Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}
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
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>

            </div>
        </form>
    </div>
</x-app-layout>
