<div>
    <form>
        <!-- BEGIN: Uplaod Product - Imagen -->
        <div class="intro-y box p-5">
            <div class="border border-slate-200/60 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 pb-5">
                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> {{ __('Add Image') }}
                </div>
                <div class="mt-5">
                    <div class="flex items-center text-slate-500">
                        <span><i data-lucide="lightbulb" class="w-5 h-5 text-warning"></i></span>
                        <div class="ml-2">
                            <span
                                class="mr-1">{{ __('Avoid selling counterfeit products / violating Intellectual Property Rights, so that your products are not deleted.') }}</span>
                            <a href="https://themeforest.net/item/midone-jquery-tailwindcss-html-admin-template/26366820"
                                class="text-primary font-medium" target="blank">{{ __('Learn More') }}</a>
                        </div>
                    </div>
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
                                    {{-- <div class="mt-2">Select product photos or drag and drop up to 5 photos at
                                    once here. Include min. 3 attractive photos to make the product more
                                    attractive to buyers.</div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed rounded-md pt-4">
                            <div class="grid grid-cols-10 gap-5 pl-4 pr-5">

                                <div class="col-span-5 md:col-span-2 h-28 relative image-fit cursor-pointer zoom-in">
                                    <img class="rounded-md" alt="Midone - HTML Admin Template"
                                        src="{{ asset('build/assets/images/preview-11.jpg') }}">
                                    <div title="Remove this image?"
                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload
                                    a
                                    file</span> or drag and drop
                                <input id="horizontal-form-1" type="file"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
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
                                placeholder="{{ __('Enter SKU') }}" required />
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
                            <div class="form-help text-right">{{ __('Maximum character') }} 0/70</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Family') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select wire:model.live='family_id' id="family_id" data-placeholder="Seleccione una familia"
                                class="tom-select w-full">
                                <option value="" disabled selected>Seleccione una familia</option>
                                @foreach ($families as $family)
                                    <option value="{{ $family->id }}">{{ $family->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('subcategory.family_id')" class="mt-2" />
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ __('Category') }}</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                        {{ __('Required') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select wire:model.live='category_id' id="category_id"
                                data-placeholder="Seleccione una categoría" class="tom-select w-full">
                                <option value="" disabled>Seleccione una categoría</option>
                                @foreach ($this->categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('subcategory.family_id')" class="mt-2" />
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Subcategory</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    You can add a new subcategory or choose from the existing subcategory list.
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select wire:model.live='product.subcategory_id' id="subcategory_id"
                                data-placeholder="Seleccione una subcategoría" class="tom-select w-full">
                                <option value="" disabled>Seleccione una subcategoría</option>
                                @foreach ($this->subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
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
                                    <input id="condition-new" class="form-check-input" type="radio"
                                        name="horizontal_radio_button" value="horizontal-radio-chris-evans">
                                    <label class="form-check-label" for="condition-new">{{ __('New') }}</label>
                                </div>
                                <div class="form-check mr-4 mt-2 sm:mt-0">
                                    <input id="condition-second" class="form-check-input" type="radio"
                                        name="horizontal_radio_button" value="horizontal-radio-liam-neeson">
                                    <label class="form-check-label"
                                        for="condition-second">{{ __('Used') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <x-textarea name="description" wire:model='product.description'
                                class="editor"></x-textarea>
                            {{-- <div class="editor">
                                <p>Content of the editor.</p>
                            </div> --}}
                            <div class="form-help text-right">{{ __('Maximum character') }} 0/2000</div>
                        </div>
                    </div>

                    {{-- <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Product Video</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    Add a video so that buyers are more interested in your product. <a
                                        href="https://themeforest.net/item/midone-jquery-tailwindcss-html-admin-template/26366820"
                                        class="text-primary font-medium" target="blank">Learn more.</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <button class="btn btn-outline-secondary w-40">
                                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Video URL
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- END: Product Detail -->

        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <button type="button" class="btn py-3 border-slate-300 text-slate-500 w-full md:w-52">Cancel</button>
            <button type="button" class="btn py-3 border-slate-300 text-slate-500 w-full md:w-52">Save & Add New
                Product</button>
            <button type="button" class="btn py-3 btn-primary w-full md:w-52">Save</button>
        </div>
    </form>
</div>
