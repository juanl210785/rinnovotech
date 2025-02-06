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

            <div class="mt-4 space-y-6">
                
            </div>
        </div>        
    </div>

    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">
            {{__('Add New Option')}}
        </x-slot>

        <x-slot name="content">
            <div class="w-full">
                <label for="modal-form-6" class="form-label">{{ __('Type') }}</label>
                <select id="modal-form-6" class="form-select" wire:model.live='variant.option_id'>
                    <option value="" disabled>{{ __('Select an option')}}</option>
                    @foreach ($options as $option)
                        <option value="{{$option->id}}" @selected(old('variant.option_id') == $option->id)>{{ $option->name }}</option>
                    @endforeach
                    
                </select>                
            </div>

            <div class="flex items-center justify-between my-4">
                <span class="font-semibold"> {{ __('Values') }}</span>
                <button type="button" wire:click="addFeature" class="btn btn-secondary w-20 font-semibold"
                    >{{ __('Add') }}</button>
            </div>

            <ul class=" space-y-4">
                @foreach ($variant['features'] as $index => $feature)
                    <li wire:key="variant-features-{{$index}}" class="p-6 rounded-md border border-slate-200/60 relative">
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

                                <select id="modal-form-6" class="form-select" wire:model='variant.features.{{$index}}.id'>
                                    <option value="" disabled>{{ __('Select an value')}}</option>
                                    @foreach ($this->features as $feature)
                                        <option value="{{$feature->id}}" @selected(old('variant.option_id') == $feature->id)>{{ $feature->description }}</option>
                                    @endforeach                                    
                                </select>

                                {{$variant['features'][$index]['id']}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
        
    </x-dialog-modal>
</div>
