<div>
    @php
        $numberRandom = rand(1, 400);
    @endphp
    <form wire:submit.prevent='save' enctype="multipart/form-data">
        <!-- BEGIN: Uplaod Product - Imagen -->
        <div class="intro-y box p-5">
            <div class="border border-slate-200/60 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 pb-5">
                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> {{ __('Add Image') }}
                </div>
                <div class="mt-5">
                    <div class="flex items-center text-slate-500">
                        <span>
                            <i data-lucide="lightbulb" class="w-5 h-5 text-warning"></i>
                        </span>

                        <div class="ml-2">
                            <span class="mr-1">
                                {{ __('Avoid selling counterfeit products / violating Intellectual Property Rights, so that your products are not deleted.') }}
                            </span>
                            <a href="#" class="text-primary font-medium">
                                {{ __('Learn More') }}
                            </a>
                        </div>
                    </div>
                    {{-- Imagen --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-10">

                        <div class="form-label w-full xl:w-64 xl:!mr-10">
                            <div class="text-left">

                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Product image') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>

                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    <div>
                                        {{ __('The image format is .jpg .jpeg .png and a minimum size of 300 x 300 pixels (For optimal images use a minimum size of 700 x 700 pixels).') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="w-full mt-3 xl:mt-0 border-2 border-dashed rounded-md p-4">

                            <figure class="relative" style="height: 20rem;">
                                <!-- Ajusta el tamaño predeterminado -->
                                <img class="object-contain object-center w-full h-full"
                                    src="{{ $image && in_array($image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']) ? $image->temporaryUrl() : asset('img/no_product.png') }}"
                                    alt="">
                                <div title="{{ __('Remove this photo?') }}" wire:click='removeImage'
                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger cursor-pointer right-0 top-0 -mr-2 -mt-2">
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                </div>
                            </figure>

                            <div class="mx-auto relative mt-5">
                                <button type="button" class="btn btn-primary w-full">{{ __('Change Photo') }}</button>
                                <input type="file" wire:model='image' accept="image/*"
                                    class="w-full h-full top-0 cursor-pointer left-0 absolute opacity-0">
                            </div>
                            @if (session()->has('error'))
                                <x-input-error :messages="[session('error')]" class="mt-2" />
                            @else
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Uplaod Product -->

        <!-- BEGIN: Product Information -->
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 rounded-md p-5">

                <div class="font-medium text-base flex items-center border-b border-slate-200/60 pb-5">
                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> {{ __('Product Information') }}
                </div>

                <div class="mt-5">
                    {{-- SKU --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('SKU (Stock Keeping Unit)') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    {{ __('Use a unique SKU code if you want to mark your product.') }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <x-text-input wire:model='product.sku' value="{{ old('sku') }}" class="form-control"
                                placeholder="{{ __('Enter SKU') }}" />
                            <x-input-error :messages="$errors->get('product.sku')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Nombre producto --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Product Name') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    {{ __('Include min. 40 characters to make it more attractive and easy for buyers to find, consisting of product type, brand, and information such as color, material, or type.') }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <x-text-input wire:model='product.name' placeholder="{{ __('Product Name') }}" />
                            <x-input-error :messages="$errors->get('product.name')" class="mt-2" />
                            <div class="form-help text-right">{{ __('Maximum character') }} 0/70</div>
                        </div>
                    </div>

                    {{-- Familia --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Family') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    {{ __('Choose from the existing family list.') }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select wire:model.live='family_id' key="{{ now() }}-family"
                                class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                <option value="" disabled>Seleccione una familia</option>
                                @foreach ($families as $family)
                                    <option value="{{ $family->id }}" @selected(old('family_id') == $family->id)>
                                        {{ $family->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('family_id')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Categoria --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Category') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    {{ __('Choose from the existing category list.') }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select wire:model.live='category_id' key="{{ now() }}-category"
                                class="form-select mt-2 sm:mr-2">
                                <option value="" disabled>Seleccione una categoría</option>
                                @foreach ($this->categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Subcategoria --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Subcategory') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    {{ __('Choose from the existing subcategory list.') }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select wire:model.live='product.subcategory_id' key="{{ now() }}-subcategory"
                                class="form-select mt-2 sm:mr-2">
                                <option value="" disabled>Seleccione una subcategoría</option>
                                @foreach ($this->subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" @selected(old('product.subcategory_id') == $subcategory->id)>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product.subcategory_id')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END: Product Information -->

        <!-- BEGIN: Product Detail -->
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 pb-5">
                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> {{ __('Product Detail') }}
                </div>
                <div class="mt-5">
                    {{-- Condicion --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Condition') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="flex flex-col sm:flex-row">
                                <div class="form-check mr-4">
                                    <input id="condition-new" value="Nuevo" wire:model='product.condition'
                                        class="form-check-input" type="radio" name="horizontal_radio_button"
                                        value="horizontal-radio-chris-evans">
                                    <label class="form-check-label" for="condition-new">{{ __('New') }}</label>
                                </div>
                                <div class="form-check mr-4 mt-2 sm:mt-0">
                                    <input id="condition-second" value="Usado" wire:model='product.condition'
                                        class="form-check-input" type="radio" name="horizontal_radio_button"
                                        value="horizontal-radio-liam-neeson">
                                    <label class="form-check-label"
                                        for="condition-second">{{ __('Used') }}</label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('product.condition')" class="mt-2" />
                        </div>
                    </div>
                    {{-- Status --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Status') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    {{ __('If the status is active, your product can be searched for by potential buyers.') }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="form-check form-switch">
                                <input id="product-status-active" wire:model='product.status' checked
                                    class="form-check-input" type="checkbox">
                                <label class="form-check-label"
                                    for="product-status-active">{{ __('Active') }}</label>
                            </div>
                            <x-input-error :messages="$errors->get('product.status')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Precio e Inventario --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Stock and Price') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    {{ __('Apply price and stock on your product.') }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="sm:grid grid-cols-2 gap-2">
                                <div>
                                    <div class="input-group">
                                        <div class="input-group-text">$</div>
                                        <input type="text" wire:model='product.price' class="form-control"
                                            placeholder="{{ __('Price') }}">
                                    </div>
                                    <x-input-error :messages="$errors->get('product.price')" class="mt-2" />
                                </div>
                                <div>
                                    <input type="text" wire:model='product.stock'
                                        class="form-control mt-2 sm:mt-0" placeholder="{{ __('Stock') }}">
                                    <x-input-error :messages="$errors->get('product.stock')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Descripcion --}}
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Description') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    <div>
                                        {{ __('Make sure the product description provides a detailed explanation of your product so that it is easy to understand and find your product.') }}
                                    </div>
                                    <div class="mt-2">
                                        {{ __('It is recommended not to enter info on mobile numbers, e-mails, etc. into the product description to protect your personal data.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <x-textarea name="description" wire:model='product.description'></x-textarea>
                            <x-input-error :messages="$errors->get('product.description')" class="mt-2" />
                            <div class="form-help text-right">{{ __('Maximum character') }} 0/2000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Product Detail -->

        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{ route('admin.products.index') }}"
                class="btn py-3 border-slate-300 text-slate-500 w-full md:w-52">{{ __('Cancel') }}</a>
            <button type="button"
                class="btn py-3 border-slate-300 text-slate-500 w-full md:w-52">{{ __('Save & Add New') }}</button>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">{{ __('Save') }}</button>
        </div>
    </form>

    <!-- BEGIN: Notification Content -->
    
    <!-- END: Notification Content -->


    


</div>
