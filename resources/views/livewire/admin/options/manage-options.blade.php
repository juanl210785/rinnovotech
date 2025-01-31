<div>

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ __('Options') }}
        </h2>

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center">

            <button class="btn btn-primary" wire:click="$set('openModal', true)"><i
                    class="fa-solid fa-plus mr-2"></i>{{ __('Create') }}</button>
        </div>
        <!-- END: Modal Toggle -->
    </div>


    <div class="intro-y box p-5 space-y-6">
        @foreach ($options as $option)
            <div class="p-6 rounded-md border border-slate-200/60 relative" wire:key="option-{{ $option->id }}">
                <div class="absolute -top-3 box px-4">
                    <span class="mr-2">
                        {{ $option->name }}
                    </span>
                    <button wire:click='deleteOption({{ $option->id }})'>
                        <i class="fa-solid fa-trash-can text-red-500"></i>
                    </button>
                </div>

                {{-- Valores --}}
                <div class="flex flex-wrap mb-4">
                    @foreach ($option->features as $feature)
                        @switch($option->type)
                            @case(1)
                                {{-- texto --}}
                                <span id="badge-dismiss-dark" wire:key="feature-{{ $feature->id }}"
                                    class="mb-2 inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-gray-800 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                                    {{ $feature->description }}
                                    <button type="button" wire:click="deleteFeature({{ $feature->id }})"
                                        class="inline-flex items-center p-1 ms-2 text-sm text-gray-400 bg-transparent rounded-sm hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-gray-300"
                                        data-dismiss-target="#badge-dismiss-dark" aria-label="Remove">
                                        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Remove badge</span>
                                    </button>
                                </span>
                            @break

                            @case(2)
                                {{-- color --}}
                                <div class="relative" wire:key="feature-{{ $feature->id }}">
                                    <span
                                        class="tooltip inline-block h-8 w-8 shadow-lg rounded-full border border-r-gray-300 mr-4"
                                        style="background-color: {{ $feature->value }}" title="{{ $feature->description }}">
                                    </span>

                                    <button wire:click.live="deleteFeature({{ $feature }})"
                                        class="absolute z-10 left-4 -top-2 rounded-full bg-red-500 hover:bg-red-600 h-4 w-4 flex justify-center items-center">
                                        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                </div>
                            @break

                            @default
                        @endswitch
                    @endforeach
                </div>

                @livewire('admin.options.add-new-feature', ['option' => $option], key('add-new-feature-' . $option->id))
            </div>
        @endforeach
    </div>

    <!-- BEGIN: Modal Content -->
    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">{{ __('Create new option') }}</x-slot>
        <x-slot name="content">
            <x-validation-errors class="mb-4" />

            <div class="grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-1" class="form-label">{{ __('Name') }}</label>
                    <input id="modal-form-1" type="text" class="form-control" wire:model='newOption.name'>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-6" class="form-label">{{ __('Type') }}</label>
                    <select id="modal-form-6" class="form-select" wire:model.live='newOption.type'>
                        <option value="1">{{ __('Text') }}</option>
                        <option value="2">{{ __('Color') }}</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-between my-4">
                <span class="font-semibold"> {{ __('Values') }}</span>
                <button type="button" class="btn btn-secondary w-20 font-semibold"
                    wire:click='addFeature'>{{ __('Add') }}</button>
            </div>

            <div class="space-y-4">
                @foreach ($newOption['features'] as $index => $feature)
                    <div class="grid grid-cols-12 gap-4 gap-y-4 p-6 rounded-md border border-slate-200/60 relative"
                        wire:key='features-{{ $index }}'>
                        @if ($index > 0)
                            <div class="absolute -top-3 box px-4">
                                <button wire:click='removeFeature({{ $index }})'>
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </button>
                            </div>
                        @endif
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-{{ $index }}-value"
                                class="form-label">{{ __('Value') }}</label>
                            @switch($newOption['type'])
                                @case(1)
                                    <input id="modal-form-{{ $index }}-value" type="text" class="form-control"
                                        wire:model='newOption.features.{{ $index }}.value'>
                                @break

                                @case(2)
                                    <div
                                        class="border border-gray-300 h-[38px] rounded-md flex items-center justify-between px-3">
                                        <span>{{ $newOption['features'][$index]['value'] ?: 'Selecciona un color' }}</span>
                                        <input type="color" wire:model.live='newOption.features.{{ $index }}.value'>
                                    </div>
                                @break

                                @default
                            @endswitch
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-{{ $index }}-description"
                                class="form-label">{{ __('Description') }}</label>
                            <input id="modal-form-{{ $index }}-description" type="text" class="form-control"
                                wire:model='newOption.features.{{ $index }}.description'>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-outline-secondary w-20 mr-1"
                wire:click="$set('openModal', false)">{{ __('Cancel') }}</button>
            <button type="button" wire:click="addOption" class="btn btn-primary w-20">{{ __('Send') }}</button>
        </x-slot>
    </x-dialog-modal>
    <!-- END: Modal Content <i class="fa-regular fa-circle-xmark"></i> -->

</div>
