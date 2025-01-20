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
                                <button class="btn btn-rounded btn-sm btn-dark-soft mr-1 mb-2">{{ $feature->description }}</button>
                                {{-- <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 pl-2.5 pr-1.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                    {{ $feature->description }}

                                    <button class="ml-0.5">
                                        <i class="fa-solid fa-xmark hover:text-red-600"></i>
                                    </button>

                                </span> --}}
                            @break

                            @case(2)
                                {{-- color --}}
                                <div class="relative">
                                    <span
                                        class="tooltip inline-block h-8 w-8 shadow-lg rounded-full border border-r-gray-300 mr-4"
                                        style="background-color: {{ $feature->value }}" title="{{ $feature->description }}">
                                    </span>
                                    {{-- <div data-tooltip="boton" data-tooltip-placement="bottom"
                                        class="absolute -top-10 transition-opacity duration-300 text-sm bg-gray-900 text-white p-1 rounded shadow-sm">
                                        {{ $feature->description }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div> --}}
                                    <button
                                        class="absolute z-10 left-4 -top-2 rounded-full bg-red-500 hover:bg-red-600 h-4 w-4 flex justify-center items-center">
                                        <i class="fa-solid fa-xmark text-white text-xs"></i>
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
</div>
