<div>
    <form wire:submit.prevent='AddFeature' class="flex space-x-4">

        <div class="flex-1">
            <label class="form-label">{{ __('Value') }}</label>
            @switch($option->type)
                @case(1)
                    <input type="text" class="form-control" wire:model='newFeature.value'>
                    <x-input-error :messages="$errors->get('newFeature.value')" class="mt-2" />
                @break

                @case(2)
                    <div class="border border-gray-300 h-[38px] rounded-md flex items-center justify-between px-3">
                        <span>{{ $newFeature['value'] ?: 'Selecciona un color' }}</span>
                        <input type="color" wire:model.live='newFeature.value'>

                    </div>
                    <x-input-error :messages="$errors->get('newFeature.value')" class="mt-2" />
                @break

                @default
            @endswitch
        </div>
        <div class="flex-1">
            <label class="form-label">{{ __('Description') }}</label>
            <input type="text" class="form-control" wire:model='newFeature.description'>
            <x-input-error :messages="$errors->get('newFeature.description')" class="mt-2" />
        </div>

        <div class="mt-7">
            <x-secondary-button type="submit">
                {{ __('Add') }}
            </x-secondary-button>
        </div>
    </form>
</div>
