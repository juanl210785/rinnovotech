<div>
    <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">
        <div class="lg:col-span-5 intro-y">
            <div class="flex justify-between mb-2">
                <h1 class="text-white text-lg">
                    {{ __('Shopping cart') }} ({{ Cart::count() }}) {{ __('products') }}
                </h1>
                @if (Cart::count())
                    <button
                        wire:click="destroy()"
                        class="btn btn-danger btn-sm font-semibold text-white">
                        {{ __('Delete') }}
                    </button>
                @endif

            </div>
            <div class="box p-4">
                <ul class="space-y-2">
                    @forelse (Cart::content() as $item)
                        <li class="lg:flex lg:items-center">
                            <img src="{{ $item->options->image }}"
                                class="w-full lg:w-36 aspect-[16/9] object-cover object-center mr-2" alt="">

                            <div class="w-80">
                                <p class="text-sm">
                                    <a href="{{ route('products.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </p>
                                <button
                                    wire:click="remove('{{$item->rowId}}')"
                                    class="bg-red-100 hover:bg-red-200 text-red-800 text-sm font-semibold rounded px-2.5 py-0.5 flex items-center">
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                    {{ __('Remove') }}
                                </button>
                            </div>

                            <p class="flex items-center">
                                {{ $item->price }} <i data-lucide="dollar-sign" class="w-4 h-4"></i>
                            </p>

                            <div class="ml-auto">
                                <div class="flex">
                                    <div class="space-x-3">
                                        <button class="btn btn-primary"
                                            wire:click="decrease('{{ $item->rowId }}')">
                                            -
                                        </button>
                                        <span class="inline-block w-6 text-center text-gray-700">
                                            {{ $item->qty }}
                                        </span>
                                        <button class="btn btn-primary" wire:click="increase('{{ $item->rowId }}')">
                                            +
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @empty
                        <div class="alert alert-secondary show mb-2" role="alert">
                            {{ __('There are no products in the shopping cart') }}</div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="lg:col-span-2 intro-y">
            <div class="box p-4">
                <div class="flex justify-between font-semibold">
                    <p>
                        {{ __('Total') }}
                    </p>
                    <p class="flex items-center">
                        {{ Cart::subtotal() }} <i data-lucide="dollar-sign" class="w-4 h-4"></i>
                    </p>
                </div>

                @if (Cart::count())
                    <a href="{{route('shipping.index')}}" class="btn btn-primary block w-ful text-center">
                        {{ __('Continue') }}
                    </a>
                @else
                    <a href="/" class="btn btn-primary block w-ful text-center">
                        {{ __('Back') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
