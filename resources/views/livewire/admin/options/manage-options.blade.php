<div>
    <div class="intro-y box p-5 space-y-6">
        @foreach ($options as $option)
            <div class="p-6 rounded-md border border-slate-200/60 relative" wire:key="option-{{ $option->id }}">
                <div class="absolute -top-3 box px-4">
                    <span>
                        {{ $option->name }}
                    </span>
                </div>

                {{-- Valores --}}
                <div class="flex flex-wrap">
                    @foreach ($option->features as $feature)
                        @switch($option->type)
                            @case(1)
                                {{-- texto --}}
                                <span id="badge-dismiss-dark"
                                    class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-gray-800 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                                    {{ $feature->description }}
                                    <button type="button"
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
                                <div class="relative">
                                    <span
                                        class="tooltip inline-block h-8 w-8 shadow-lg rounded-full border border-r-gray-300 mr-4"
                                        style="background-color: {{ $feature->value }}" title="{{ $feature->description }}">
                                    </span>

                                    <button
                                        class="absolute z-10 left-4 -top-2 rounded-full bg-red-500 hover:bg-red-600 h-4 w-4 flex justify-center items-center">
                                        <i data-lucide="x" class="text-white text-xs"></i>
                                        {{-- <i class="fa-solid fa-xmark text-white text-xs"></i> --}}
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

    <!-- BEGIN: Modal Content -->
    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">{{ __('Create new option') }}</x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-1" class="form-label">{{ __('Name') }}</label>
                    <input id="modal-form-1" type="text" class="form-control" wire:model='newOption.name'>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-6" class="form-label">{{ __('Type') }}</label>
                    <select id="modal-form-6" class="form-select" wire:model='newOption.type'>
                        <option value="1">{{ __('Text') }}</option>
                        <option value="2">{{ __('Color') }}</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-between">
                {{-- <hr class="flex-1 "> --}}

                <span class=""> {{ __('Values') }}</span>
                <button type="button" class="btn btn-secondary w-20"
                    wire:click='addFeature'>{{ __('Add') }}</button>

                {{-- <hr class="flex-1"> --}}
            </div>

            @foreach ($newOption['features'] as $index => $feature)
                <div class="grid grid-cols-12 gap-4 gap-y-3" wire:key='features-{{ $index }}'>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-{{ $index }}-value"
                            class="form-label">{{ __('Value') }}</label>
                        <input id="modal-form-{{ $index }}-value" type="text" class="form-control"
                            wire:model='newOption.features.{{ $index }}.value'>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-{{ $index }}-description"
                            class="form-label">{{ __('Description') }}</label>
                        <input id="modal-form-{{ $index }}-description" type="text" class="form-control"
                            wire:model='newOption.features.{{ $index }}.description'>
                    </div>
                </div>
            @endforeach
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">{{ __('Create new option') }}</h2>

                </div>
                <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">{{ __('Name') }}</label>
                        <input id="modal-form-1" type="text" class="form-control" wire:model='newOption.name'>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-6" class="form-label">{{ __('Type') }}</label>
                        <select id="modal-form-6" class="form-select" wire:model='newOption.type'>
                            <option value="1">{{ __('Text') }}</option>
                            <option value="2">{{ __('Color') }}</option>
                        </select>
                    </div>
                </div>

                <div class="modal-body flex items-center justify-between">
                    {{-- <hr class="flex-1 "> --}}

                    <span class=""> {{ __('Values') }}</span>
                    <button type="button" class="btn btn-secondary w-20"
                        wire:click='addFeature'>{{ __('Add') }}</button>

                    {{-- <hr class="flex-1"> --}}
                </div>

                @foreach ($newOption['features'] as $index => $feature)
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3" wire:key='features-{{ $index }}'>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-{{ $index }}-value"
                                class="form-label">{{ __('Value') }}</label>
                            <input id="modal-form-{{ $index }}-value" type="text" class="form-control"
                                wire:model='newOption.features.{{ $index }}.value'>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-{{ $index }}-description"
                                class="form-label">{{ __('Description') }}</label>
                            <input id="modal-form-{{ $index }}-description" type="text"
                                class="form-control" wire:model='newOption.features.{{ $index }}.description'>
                        </div>
                    </div>
                @endforeach
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">{{ __('Cancel') }}</button>
                    <button type="button" class="btn btn-primary w-20">{{ __('Send') }}</button>
                </div>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    <!-- END: Modal Content -->

    <script>
        Livewire.on('newOptionUpdated', () => {
            Livewire.update();
        });
    </script>
</div>
