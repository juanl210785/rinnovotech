<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Products'),
        'route' => route('admin.products.index'),
    ],
    [
        'name' => $product->name,
        'route' => route('admin.products.edit', $product),
    ],
    [
        'name' => $variant->features->pluck('description')->implode(', '),
    ],
]">

    @if (session('notification'))
        <x-notification clase="{{ session('notification.clase') }}" lucide="{{ session('notification.lucide') }}">
            <x-slot name="title">
                {{ session('notification.title') }}
            </x-slot>
            {{ session('notification.message') }}
        </x-notification>
    @endif

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Variant') }}</h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <div class="intro-y col-span-11 2xl:col-span-9">

            {{-- @livewire('admin.products.products-create') --}}

            {{-- Aqui va la parte 1 --}}
            <div>
                {{--  @php
                    $numberRandom = rand(1, 400);
                @endphp --}}
                <form 
                    action="{{route('admin.products.variantsUpdate', [$product, $variant])}}" 
                    method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                <div
                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
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
                                                src="{{ $variant->image }}" alt="" id="imgPreview">
                                            <div title="{{ __('Remove this photo?') }}" wire:click='removeImage'
                                                class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger cursor-pointer right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </div>
                                        </figure>

                                        <div class="mx-auto relative mt-5">
                                            <button type="button"
                                                class="btn btn-primary w-full">{{ __('Change Photo') }}</button>
                                            <input type="file" name='image' accept="image/*"
                                                onchange="previewImage(event, '#imgPreview')"
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
                                <div
                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label xl:w-64 xl:!mr-10">
                                        <div class="text-left">
                                            <div class="flex items-center">
                                                <div class="font-medium">{{ __('SKU (Stock Keeping Unit)') }}</div>
                                                <div
                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                                    {{ __('Required') }}</div>
                                            </div>
                                            <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                {{ __('Use a unique SKU code if you want to mark your product.') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        <x-text-input name='sku' value="{{ old('sku', $variant->sku) }}"
                                            class="form-control" placeholder="{{ __('Enter SKU') }}" />
                                        <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                                    </div>
                                </div>

                                {{-- Nombre producto --}}


                                {{-- Familia --}}


                                {{-- Categoria --}}


                                {{-- Subcategoria --}}


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

                                {{-- Status --}}


                                {{-- Inventario --}}
                                <div
                                    class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label xl:w-64 xl:!mr-10">
                                        <div class="text-left">
                                            <div class="flex items-center">
                                                <div class="font-medium">{{ __('Stock') }}</div>
                                                <div
                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                                    {{ __('Required') }}</div>
                                            </div>
                                            <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                {{ __('Apply stock on your product.') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        <x-text-input name='stock'
                                            type="number"
                                            value="{{ old('stock', $variant->stock) }}"
                                            placeholder="{{ __('Stock') }}" />
                                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                                    </div>
                                </div>

                                {{-- Descripcion --}}

                            </div>
                        </div>
                    </div>
                    <!-- END: Product Detail -->

                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                        <a href="{{ route('admin.products.index') }}"
                            class="btn py-3 border-slate-300 text-slate-500 w-full md:w-52">{{ __('Cancel') }}</a>
                        {{-- <button type="button"
                            class="btn py-3 border-slate-300 text-slate-500 w-full md:w-52">{{ __('Save & Add New') }}</button> --}}
                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">{{ __('Update') }}</button>
                    </div>
                </form>

                <!-- BEGIN: Notification Content -->

                <!-- END: Notification Content -->





            </div>
        </div>

        {{-- Aqui va parte 2 --}}
    </div>

    @push('js')
        <script src="resources/js/ckeditor-classic.js"></script>

        <script>
            function previewImage(event, querySelector) {

                //Recuperamos el input que desencadeno la acción
                let input = event.target;

                //Recuperamos la etiqueta img donde cargaremos la imagen
                let imgPreview = document.querySelector(querySelector);

                // Verificamos si existe una imagen seleccionada
                if (!input.files.length) return

                //Recuperamos el archivo subido
                let file = input.files[0];

                //Creamos la url
                let objectURL = URL.createObjectURL(file);

                //Modificamos el atributo src de la etiqueta img
                imgPreview.src = objectURL;

            }
        </script>
    @endpush

</x-app-layout>

{{-- <x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Products'),
        'route' => route('admin.products.index'),
    ],
    [
        'name' => $product->name,
        'route' => route('admin.products.edit', $product),
    ],
    [
        'name' => $variant->features->pluck('description')->implode(', '),
    ],
]">

    <form action="" method="POST">
        @csrf
        <div class="relative mb-6">
            <figure>
                <img class=" aspect-[16/9] w-full object-cover object-center" src="{{ $variant->image }}"
                    id="imgPreview">
            </figure>

            <div class="absolute top-8 right-8">
                <label class="flex items-center bg-white px-4 py-2 rounded-lg cursor-pointer">
                    <i class="fas fa-camera mr-2"></i>
                    {{ __('Update') }}

                    <input class=" hidden" accept="image/*" type="file"
                        onchange="previewImage(event, '#imgPreview')" name="image">
                </label>
            </div>
        </div>

        <div class="mt-5">
            <div class="intro-x box p-4">
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
                        <x-text-input name='sku' value="{{ old('sku', $variant->sku) }}" class="form-control"
                            placeholder="{{ __('Enter SKU') }}" />
                        <x-input-error :messages="$errors->get('product.sku')" class="mt-2" />
                    </div>
                </div>

                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">{{ __('Stock') }}</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                    {{ __('Required') }}</div>
                            </div>
                            <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                {{ __('Apply stock on your product.') }}
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <x-text-input wire:model='productEdit.stock' placeholder="{{ __('Stock') }}" />
                        <x-input-error :messages="$errors->get('productEdit.stock')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('js')
        <script>
            function previewImage(event, querySelector) {

                //Recuperamos el input que desencadeno la acción
                let input = event.target;

                //Recuperamos la etiqueta img donde cargaremos la imagen
                let imgPreview = document.querySelector(querySelector);

                // Verificamos si existe una imagen seleccionada
                if (!input.files.length) return

                //Recuperamos el archivo subido
                let file = input.files[0];

                //Creamos la url
                let objectURL = URL.createObjectURL(file);

                //Modificamos el atributo src de la etiqueta img
                imgPreview.src = objectURL;

            }
        </script>
    @endpush

</x-app-layout> --}}
