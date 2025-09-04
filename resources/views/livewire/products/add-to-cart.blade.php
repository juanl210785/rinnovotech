<x-container>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div>
                <div class="intro-y box shadow-lg mt-5">
                    <div id="fade-animation-slider" class="p-5">
                        <div class="preview">
                            <div class="">
                                <div class="fade-mode">
                                    <div class="h-64">
                                        <div class="h-full image-fit rounded-md overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="{{ $product->image }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                

                {{-- <div class="mt-4 text-gray-700">
                    <h2 class="font-bold text-lg">{{ __('Leave review') }}</h2>
                    <form action="{{ route('reviews.store', $product) }}" method="POST">
                        @csrf
                        <textarea name="coment" id="editor"></textarea>
                        <x-input-error for="coment" />

                        <div class="flex items-center mt-2" x-data="{ raiting: 5 }">
                            <p class="font-semibold mr-3">{{ __('Score') }}</p>
                            <ul class="flex space-x-2">
                                <li x-bind:class="raiting >= 1 ? 'text-yellow-500' : ''">
                                    <button type="button" x-on:click="raiting = 1">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="raiting >= 2 ? 'text-yellow-500' : ''">
                                    <button type="button" x-on:click="raiting = 2">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="raiting >= 3 ? 'text-yellow-500' : ''">
                                    <button type="button" x-on:click="raiting = 3">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="raiting >= 4 ? 'text-yellow-500' : ''">
                                    <button type="button" x-on:click="raiting = 4">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="raiting >= 5 ? 'text-yellow-500' : ''">
                                    <button type="button" x-on:click="raiting = 5">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                            </ul>
                            <input name="raiting" hidden type="number" x-model="raiting">
                            <x-input-error for="raiting" />

                            <x-button class="ml-auto">
                                {{ __('Add review') }}
                            </x-button>
                        </div>
                    </form> 
                </div> --}}

                {{-- @if ($product->reviews->isNotEmpty())
                    <div class="mt-6 text-gray-700">
                        <h2 class="font-bold text-lg">{{ __('Reviews') }}</h2>

                        <div class="mt-2">

                            @foreach ($product->reviews as $review)
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 object-cover object-center rounded-full mr-4"
                                            src="{{ Storage::url($review->user->profile_photo_path) }}"
                                            alt="{{ $review->user->name }}">
                                    </div>

                                    <div class="flex-1">
                                        <p class="font-semibold">{{ $review->user->name }}</p>
                                        <p class="text-sm">{{ $review->created_at->diffforHumans() }}</p>
                                        <div>
                                            {!! $review->coment !!}
                                        </div>
                                    </div>

                                    <div>
                                        <p>
                                            {{ $review->raiting }}
                                            <i class="fas fa-star text-yellow-500"></i>
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif --}}
            </div>

            <div>
                <div class="intro-y box p-4 mt-5 mb-2">
                    <h1 class=" text-xl font-bold text-trueGray-700">{{ $product->name }}</h1>
                    {{-- <div class="flex">
                        <p class="text-trueGray-700">{{ __('Brand') }}: <a
                                class=" underline capitalize hover:text-orange-500"
                                href="">{{ $product->brand->name }}</a></p>
                        <p class="text-trueGray-700 ml-6">{{ round($product->reviews->avg('raiting'), 1) }} <i
                                class="fas fa-star text-sm text-yellow-400"></i></p>
                        <a class=" text-orange-500 underline mx-6 hover:text-orange-600"
                            href="">{{ $product->reviews->count() }} {{ __('Reviews') }}</a> 
                    </div> --}}
                    <p class="text-2xl font-semibold text-trueGray-700 my-4">USD {{ $product->price }}</p>
                </div>
                <div class="intro-y box rounded-lg shadow-lg mb-2">
                    <div class=" p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-green-700">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>

                        <div class=" ml-4">
                            <p class="text-lg font-semibold text-green-600">
                                {{ __('Shipments are made throughout the Venezuelan territory') }}</p>
                            <p>{{ __('Receive it on') }} {{ now()->addDay(7)->isoFormat('LL') }}</p>
                        </div>
                    </div>
                </div>

                <div class="intro-y box p-4 shadow-lg" 
                    x-data="{
                        qty: @entangle('qty'),
                    }">
                    <p class=" text-trueGray-700 mb-4">
                        <span
                            class=" font-semibold text-lg mr-2">{{ __('Available stock') }}:</span>
                            {{ $product->stock }}
                    </p>
                    <div class="flex">
                        <div>
                            <button class="btn btn-primary"
                                 x-on:click="qty = qty - 1"
                                 x-bind:disabled="qty == 1">
                                -
                            </button>
                            <span x-text="qty" class="inline-block w-6 text-center text-gray-700"></span>
                            <button class="btn btn-primary" 
                                x-on:click="qty = qty + 1">
                                +
                            </button>
                        </div>
                        <div class=" flex-1 ml-4">
                            <button class="btn btn-primary w-full" x-bind:disabled="$wire.qty > $wire.quantity"
                                wire:click="addItem" wire:loading.attr="disabled" wire.target="addItem">
                                {{ __('Add to shopping cart') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-2 intro-y box p-4 shadow-lg text-gray-700">
                    <h2 class="font-bold text-lg">{{ __('Description') }}</h2>
                    {!! $product->description !!}
                </div>
                {{-- @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif --}}
            </div>
        </div>
    </x-container>
