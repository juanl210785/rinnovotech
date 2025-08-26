<div class="bg-secondary dark:bg-slate-800 py-12">
    <x-container class="md:flex px-4">
        @if (count($options))
            <aside class="md:w-52 md:flex-shrink-0 mr-8 intro-y">
                <ul id="faq-accordion-1" class="space-y-4 accordion">
                    @foreach ($options as $option)
                        <div class="accordion-item">
                            <li x-data="{ open: true }" x-init="$watch('open', () => window.redrawLucideIcons())">
                                <button
                                    class="px-4 py-2 bg-emerald-200 dark:bg-slate-200 w-full text-left font-semibold text-primary dark:text-slate-600 flex justify-between items-center"
                                    @click="open = !open">
                                    {{ $option['name'] }}
                                    <i :data-lucide="open ? 'chevron-down' : 'chevron-up'"></i>
                                </button>

                                <ul class="mt-2 space-y-2" x-show="open">
                                    @foreach ($option['features'] as $feature)
                                        <li>
                                            <label class=" inline-flex items-center">
                                                <input id="checkbox-switch-1" class="form-check-input mr-2"
                                                    type="checkbox" value="{{ $feature['id'] }}"
                                                    wire:model.live='selected_features'>
                                                {{ __($feature['description']) }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </aside>
        @endif
        <div class="flex-1">
            @if (count($products))
                <div class="flex items-center intro-y">
                    <span class="mr-2">
                        {{ __('Order by') }}:
                    </span>
                    <div>
                        <select class="form-select" wire:model.live='orderBy' aria-label="Default select example">
                            <option value="1">{{ __('Relevance') }}</option>
                            <option value="2">{{ __('Price: Highest to lowest') }}</option>
                            <option value="3">{{ __('Price: Lowest to Highest') }}</option>
                        </select>
                    </div>


                </div>

                <hr class="my-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                    @foreach ($products as $product)
                        <div class="intro-y">
                            <div class="box">
                                <div class="p-5">
                                    <div
                                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                        <img alt="Midone - HTML Admin Template" class="rounded-md"
                                            src="{{ $product->image }}">
                                        @if ($product->condition == 'Usado')
                                            <span
                                                class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Usado</span>
                                        @endif
                                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                            <h1 class="text-xl font-medium leading-none line-clamp-2">
                                                {{ $product->name }}
                                            </h1>
                                            <span
                                                class="text-white/90 text-xs mt-3">{{ $product->subcategory->category->name }}</span>
                                        </div>
                                    </div>
                                    <div class="text-slate-600 mt-5">
                                        <div class="flex items-center">
                                            <i data-lucide="dollar-sign" class="w-4 h-4 mr-2"></i> {{ __('Price') }}:
                                            ${{ $product->price }}
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60">
                                    <a href="{{route('products.show', $product)}}" class="btn btn-rounded-primary w-full">{{ __('See more') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @else
                <div class="alert alert-warning show flex items-center mb-2" role="alert">
                    <i data-lucide="alert-circle" class="w-6 h-6 mr-2"></i>
                    {{ __('There are no products added to the family') }}
                </div>
            @endif
        </div>
    </x-container>

</div>
