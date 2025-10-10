<x-client-layout>
    <x-container class="px-4 my-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                @livewire('shipping.shipping-addresses')
            </div>
            <div class="md:col-span-1">
                <section class="intro-y box col-span-12 lg:col-span-6 mb-4">
                    <header class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60">
                        <h2 class="font-medium text-base mr-auto">Resumen de compra ({{Cart::instance('shopping')->count()}})</h2>
                        <a href="{{route('cart.index')}}">
                            <i data-lucide="shopping-cart"></i>
                        </a>
                    </header>
                    <div class="p-5">
                        <ul>
                            @foreach (Cart::content() as $item)
                                <li class="flex items-center space-x-4">
                                    <div class=" w-14 h-14 image-fit zoom-in">
                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="{{$item->options->image}}" title="{{$item->name}}">
                                    </div>

                                    <div class="flex-1">
                                        <p>
                                            {{$item->name}}
                                        </p>
                                        <p class="flex items-center">
                                            {{$item->price}}
                                            <i data-lucide="dollar-sign" class="w-4"></i>
                                        </p>
                                    </div>

                                    <div>
                                        <p>
                                            {{$item->qty}}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <hr class="my-4">

                        <div class="flex justify-between">
                            <p class="text-lg">
                                Total
                            </p>

                            <p class="flex items-center">
                                {{Cart::subtotal()}}
                                <i data-lucide="dollar-sign" class="w-4"></i>
                            </p>
                        </div>

                    </div>
                </section>
                <a href="{{route('checkout.index')}}" class="intro-y btn btn-success block w-full text-center">
                    {{__('Next')}}
                </a>
            </div>
        </div>
    </x-container>
</x-client-layout>
