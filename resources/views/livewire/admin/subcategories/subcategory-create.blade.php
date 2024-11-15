<div>
    {{-- <x-validation-errors class="mb-4" /> --}}

    <form wire:submit.prevent='save'>
        <div class="mb-4">
            <x-input-label for="regular-form-1" class="form-label">Familia de producto</x-input-label>

            <div>
                <div class="mt-2">
                    <select wire:model.live='subcategory.family_id' id="family_id"
                        data-placeholder="Seleccione una familia" class="tom-select w-full">
                        <option value="" disabled selected>Seleccione una familia</option>
                        @foreach ($families as $family)
                            <option value="{{ $family->id }}">{{ $family->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('subcategory.family_id')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="regular-form-1" class="form-label">Categoría de producto</x-input-label>

            <div>
                <div class="mt-2">
                    <select id="category_id" wire:model.live='subcategory.category_id'
                        data-placeholder="Seleccione una categoría" class="tom-select w-full" name="category_id">
                        <option value="" selected>Seleccione una categoría</option>
                        @foreach ($this->categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('subcategory.category_id')" class="mt-2" />
                </div>
            </div>
        </div>

        <div>
            <x-input-label for="regular-form-1" class="form-label">Nombre de subcategoría</x-input-label>
            <x-text-input type="text" class="form-control" wire:model='subcategory.name' />
            <x-input-error :messages="$errors->get('subcategory.name')" class="mt-2" />
        </div>

        <div class="mt-2 flex justify-end">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>

        </div>
    </form>
</div>
