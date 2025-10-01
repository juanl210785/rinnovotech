<div>
    <section class="intro-y box col-span-12 lg:col-span-6">
        <header class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60">
            <h2 class="font-medium text-base mr-auto">Direcciones guardadas</h2>
        </header>
        <div class="p-5">
            <x-validation-errors/>
            @if ($newAddress)
                <div class="grid grid-cols-4 gap-4">
                     <div class="col-span-1">
                        <select class="form-select form-select-default"
                                name="type"
                                wire:model='createAddress.type'
                                aria-label="Default select example" required>
                                <option  value="">{{__('Tipo dirección')}}</option>
                                <option value="1">{{__('Domicilio')}}</option>
                                <option value="2">{{__('Oficina')}}</option>
                            </select>
                     </div>
                     <div class="col-span-3">
                        <input type="text" wire:model='createAddress.description' name="description" class="form-control"
                            placeholder="{{ __('Dirección') }}" aria-label="description" aria-describedby="description" required>
                     </div>
                     <div class="col-span-2">
                        <input type="text" wire:model='createAddress.estado' name="estado" class="form-control"
                            placeholder="{{ __('Estado') }}" aria-label="estado" aria-describedby="estado" required>
                     </div>
                     <div class="col-span-2">
                        <input type="text" wire:model='createAddress.reference' name="reference" class="form-control"
                            placeholder="{{ __('Referencia') }}" aria-label="reference" aria-describedby="reference" required>
                     </div>
                </div>

                <hr class="my-4">

                <div x-data="{
                    receiver: @entangle('createAddress.receiver'),
                    receiver_info: @entangle('createAddress.receiver_info')
                    }" x-init="
                        $watch('receiver', value => {
                            if(value == 1){
                                receiver_info.name = '{{ auth()->user()->name }}';
                                receiver_info.last_name = '{{ auth()->user()->last_name }}';
                                receiver_info.document_type = '{{ auth()->user()->document_type }}';
                                receiver_info.document_number = '{{ auth()->user()->document_number }}';
                                receiver_info.phone_type = '{{ auth()->user()->phone_type }}';
                                receiver_info.phone_number = '{{ auth()->user()->phone_number }}';
                            }else{
                                receiver_info.name = '';
                                receiver_info.last_name = '';
                                receiver_info.document_type = '';
                                receiver_info.document_number = '';
                                receiver_info.phone_type = '';
                                receiver_info.phone_number = '';
                            }
                        })
                    ">
                    <p class=" font-semibold mb-2">
                        {{__('¿Quien recibirá el pedido?')}}
                    </p>

                    <div class="flex space-x-4 mb-2">
                        <label class="flex items-center">                            
                            <input x-model="receiver" class="form-check-input mr-1" type="radio" value="1">
                            Sere yo
                        </label>
                        <label class="flex items-center">                            
                            <input x-model="receiver" class="form-check-input mr-1" type="radio" value="2">
                            Otra persona
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <input x-model="receiver_info.name" x-bind:disabled="receiver == 1" type="text" class="form-control"
                            placeholder="{{ __('Nombres') }}" aria-label="name" aria-describedby="name" required>
                        </div>
                        <div>
                            <input x-model="receiver_info.last_name" x-bind:disabled="receiver == 1" type="text" class="form-control"
                            placeholder="{{ __('Apellidos') }}" aria-label="last_name" aria-describedby="last_name" required>
                        </div>
                        <div class="flex space-x-2">
                            <select class="form-select form-select-default"
                                x-model="receiver_info.document_type"
                                x-bind:disabled="receiver == 1"
                                aria-label="Default select example" required>
                                <option  value="">{{__('Documento')}}</option>
                                @foreach (\App\Enums\TypeOfDocuments::cases() as $item)
                                    <option value="{{$item->value}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <input x-model="receiver_info.document_number" x-bind:disabled="receiver == 1" type="text" class="form-control"
                            placeholder="{{ __('Cedula/RIF') }}" aria-label="document_number" aria-describedby="document_number" required>
                        </div>
                        <div class="flex space-x-2">
                            <select class="form-select form-select-default"
                                x-model="receiver_info.phone_type"
                                x-bind:disabled="receiver == 1"
                                aria-label="Default select example" required>
                                    <option value="">{{__('Operadora')}}</option>
                                @foreach (\App\Enums\TypeOfPhone::cases() as $item)
                                    <option value="{{$item->value}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <input x-model="receiver_info.phone_number" x-bind:disabled="receiver == 1" type="text" class="form-control"
                                placeholder="{{ __('Phone') }}" aria-label="phone_number" aria-describedby="phone_number" required>
                        </div>
                        <div>
                            <button wire:click="$set('newAddress', false)" class="btn btn-danger w-full">{{__('Cancel')}}</button>
                        </div>
                        <div>
                            <button wire:click='saveAddress' class="btn btn-primary w-full">{{__('New')}}</button>
                        </div>
                    </div>

                </div>
            @else
                @if ($addresses->count())
                    <ul class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        @foreach ($addresses as $item)
                            <li class="box">
                                <div class="p-4 flex items-center">
                                    <div>
                                        <i data-lucide="home" class="text-primary"></i>
                                    </div>
                                    <div class="flex-1 mx-4 text-xs">
                                        <p class="text-primary">
                                            {{$item->type == 1 ? 'Domicilio' : 'Oficina'}}
                                        </p>
                                        <p class="font-semibold text-gray-700">
                                            {{$item->district}}
                                        </p>
                                        <p class="font-semibold text-gray-700">
                                            {{$item->description}}
                                        </p>
                                        <p class="font-semibold text-gray-700">
                                            {{$item->receiver_info['name']}}
                                            {{$item->receiver_info['last_name']}}
                                        </p>
                                    </div>
                                    <div class="flex flex-col">
                                        <button>
                                            <i data-lucide="star" class="w-4 h-4"></i></button>
                                        <button>
                                            <i data-lucide="edit-2" class="w-4 h-4"></i>
                                        </button>
                                        <button>
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">
                        No se encontraron direcciones
                    </p>
                @endif

                <button class="btn bg-primary w-full flex items-center justify-center mt-4 text-white"
                    wire:click="$set('newAddress', true)">
                    {{__('Add')}}
                    <i data-lucide="plus" class="ml-2"></i>                              
                </button>
            @endif
        </div>
    </section>
</div>
