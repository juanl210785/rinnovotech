<div>
    <div class="intro-y box p-5 mt-5">
        <div class="border border-slate-200/60 rounded-md p-5">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium mr-auto">
                    {{ __('Options') }}
                </h2>
                <!-- BEGIN: Modal Toggle -->
                <div class="text-center">
                    <button class="btn btn-primary" wire:click="$set('openModal', true)"><i
                            class="fa-solid fa-plus mr-2"></i>{{ __('Create') }}</button>
                </div>
            </div>

            @if ($product->options->count())
                <div class="mt-4 space-y-6">
                    @foreach ($product->options as $option)
                        <div class="p-6 rounded-md border border-slate-200/60 relative"
                            wire:key="option-product-{{ $option->id }}">
                            <div class="absolute -top-3 box px-4">
                                <span class="mr-2">
                                    {{ $option->name }}
                                </span>
                                <button onclick="deleteProductOption({{ $option->id }})">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </button>
                            </div>

                            {{-- Valores --}}
                            <div class="flex flex-wrap mb-4">
                                @foreach ($option->pivot->features as $feature)
                                    @switch($option->type)
                                        @case(1)
                                            {{-- texto --}}
                                            <span id="badge-dismiss-dark" wire:key="feature-text-{{ $feature['id'] }}"
                                                class="mb-2 inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-gray-800 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                                                {{ $feature['description'] }}
                                                <button type="button"
                                                    onclick="deleteProductFeature({{ $option->id }}, {{ $feature['id'] }})"
                                                    class="inline-flex items-center p-1 ms-2 text-sm text-gray-400 bg-transparent rounded-sm hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-gray-300"
                                                    data-dismiss-target="#badge-dismiss-dark" aria-label="Remove">
                                                    <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Remove badge</span>
                                                </button>
                                            </span>
                                        @break

                                        @case(2)
                                            {{-- color --}}
                                            <div class="relative" wire:key="feature-color-{{ $feature['id'] }}">
                                                <span
                                                    class="tooltip inline-block h-8 w-8 shadow-lg rounded-full border border-r-gray-300 mr-4"
                                                    style="background-color: {{ $feature['value'] }}"
                                                    title="{{ $feature['description'] }}">
                                                </span>

                                                <button
                                                    onclick="deleteProductFeature({{ $option->id }}, {{ $feature['id'] }})"
                                                    class="absolute z-10 left-4 -top-2 rounded-full bg-red-500 hover:bg-red-600 h-4 w-4 flex justify-center items-center">
                                                    <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        @break

                                        @default
                                    @endswitch
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-pending show flex items-center mt-4 mb-2 " role="alert">
                    <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> No existen opciones agregadas al producto
                </div>
            @endif
        </div>
    </div>

    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">
            {{ __('Add New Option') }}
        </x-slot>

        <x-slot name="content">
            <x-validation-errors class="mb-4" />
            <div class="w-full">
                <label for="modal-form-6" class="form-label">{{ __('Type') }}</label>
                <select id="modal-form-6" class="form-select" wire:model.live='variant.option_id'>
                    <option value="" disabled>{{ __('Select an option') }}</option>
                    @foreach ($options as $option)
                        <option value="{{ $option->id }}" @selected(old('variant.option_id') == $option->id)>{{ $option->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="flex items-center justify-between my-4">
                <span class="font-semibold"> {{ __('Values') }}</span>
                <button type="button" wire:click="addFeature"
                    class="btn btn-secondary w-20 font-semibold">{{ __('Add') }}</button>
            </div>

            <ul class=" space-y-4">
                @foreach ($variant['features'] as $index => $feature)
                    <li wire:key="variant-features-{{ $index }}"
                        class="p-6 rounded-md border border-slate-200/60 relative">
                        @if ($index > 0)
                            <div class="absolute -top-3 box px-4">
                                <button wire:click='removeFeature({{ $index }})'>
                                    <i class="fa-solid fa-trash-can text-red-500 hover:text-red-600"></i>
                                </button>
                            </div>
                        @endif

                        <div>
                            <label for="modal-form-{{ $index }}-value"
                                class="form-label">{{ __('Value') }}</label>

                            <select id="modal-form-6" class="form-select"
                                wire:model='variant.features.{{ $index }}.id'
                                wire:change="feature_change({{ $index }})">
                                <option value="" disabled>{{ __('Select an value') }}</option>
                                @foreach ($this->features as $feature)
                                    <option value="{{ $feature->id }}" @selected(old('variant.option_id') == $feature->id)>
                                        {{ $feature->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-slot>

        <x-slot name="footer">
            <button type="button" class="btn btn-outline-secondary w-20 mr-1"
                wire:click="$set('openModal', false)">{{ __('Cancel') }}</button>
            <button type="button" wire:click="save" class="btn btn-primary w-20">{{ __('Save') }}</button>
        </x-slot>

    </x-dialog-modal>

    @push('js')
        <script>
            function deleteProductFeature(option_id, feature_id) {
                Swal.fire({
                    title: "Esta seguro?",
                    text: "!No podras revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminalo!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        @this.call('deleteProductFeature', option_id, feature_id)
                        /* Swal.fire({
                            title: "¡Eliminado!",
                            text: "El elemento ha sido eliminado",
                            icon: "success"
                        }); */
                    }
                });
            }

            function deleteProductOption(option_id) {
                Swal.fire({
                    title: "Esta seguro?",
                    text: "!No podras revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminalo!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('deleteProductOption', option_id)
                    }
                });
            }
        </script>
    @endpush
</div>
