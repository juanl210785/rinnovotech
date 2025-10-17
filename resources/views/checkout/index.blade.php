<x-client-layout>
    <div class="-mb-12" x-data="{
        pago: true
    }">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="col-span-1 bg-white dark:bg-transparent">
                <div class="lg:max-w-[40rem] px-4 py-12 lg:pr-8 sm:pl-6 lg:pl-8 ml-auto">

                    <h1 class="text-2xl font-semibold mb-4">
                        Pago
                    </h1>

                    <div id="faq-accordion-2" class="accordion accordion-boxed">
                        <div class="accordion-item">
                            <div id="faq-accordion-content-5" class="accordion-header flex justify-between">
                                <button class="accordion-button" type="button" data-tw-toggle="collapse"
                                    data-tw-target="#faq-accordion-collapse-5" aria-expanded="false"
                                    aria-controls="faq-accordion-collapse-5">
                                    {{ __('Credit card') }}
                                </button>
                                <img class="w-40 h-8" src="{{ asset('img/cerdit_card.png') }}" alt="">
                            </div>
                            <div id="faq-accordion-collapse-5" class="accordion-collapse collapse show"
                                aria-labelledby="faq-accordion-content-5" data-tw-parent="#faq-accordion-2">
                                <div class="accordion-body text-slate-600 leading-relaxed">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div id="faq-accordion-content-6" class="accordion-header flex justify-between">
                                <button class="accordion-button collapsed" type="button" data-tw-toggle="collapse"
                                    data-tw-target="#faq-accordion-collapse-6" aria-expanded="false"
                                    aria-controls="faq-accordion-collapse-6">
                                    {{ __('Mobile payment') }}
                                </button>
                                <img class="w-10 h-10" src="{{ asset('img/pngegg.png') }}" alt="">
                            </div>
                            <div id="faq-accordion-collapse-6" class="accordion-collapse collapse"
                                aria-labelledby="faq-accordion-content-6" data-tw-parent="#faq-accordion-2">
                                <div class="accordion-body text-slate-600 leading-relaxed">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div id="faq-accordion-content-7" class="accordion-header flex justify-between">
                                <button class="accordion-button collapsed" type="button" data-tw-toggle="collapse"
                                    data-tw-target="#faq-accordion-collapse-7" aria-expanded="false"
                                    aria-controls="faq-accordion-collapse-7">
                                    {{ __('PayPal') }}
                                </button>
                                <img class="w-10 h-10" src="{{ asset('img/paypal.png') }}" alt="">
                            </div>
                            <div id="faq-accordion-collapse-7" class="accordion-collapse collapse"
                                aria-labelledby="faq-accordion-content-7" data-tw-parent="#faq-accordion-2">
                                <div class="accordion-body text-slate-600 leading-relaxed">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div id="faq-accordion-content-8" class="accordion-header flex justify-between">
                                <button class="accordion-button collapsed" type="button" data-tw-toggle="collapse"
                                    data-tw-target="#faq-accordion-collapse-8" aria-expanded="false"
                                    aria-controls="faq-accordion-collapse-8">
                                    {{ __('Stripe') }}
                                </button>
                                <img class="w-18 h-10" src="{{ asset('img/stripe.png') }}" alt="">
                            </div>
                            <div id="faq-accordion-collapse-8" class="accordion-collapse collapse"
                                aria-labelledby="faq-accordion-content-8" data-tw-parent="#faq-accordion-2">
                                <div class="accordion-body text-slate-600 leading-relaxed">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 bg-gray-200 dark:bg-transparent">
                <div class="lg:max-w-[40rem] px-4 py-12 lg:pl-8 sm:pr-6 lg:pr-8 mr-auto">
                    <section class="intro-y box col-span-12 lg:col-span-6 mb-4">
                        <header class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60">
                            <h2 class="font-medium text-base mr-auto">Resumen de compra
                                ({{ Cart::instance('shopping')->count() }})</h2>
                            <a href="{{ route('cart.index') }}">
                                <i data-lucide="shopping-cart"></i>
                            </a>
                        </header>
                        <div class="p-5">
                            <ul>
                                @foreach (Cart::instance('shopping')->content() as $item)
                                    <li class="flex items-center space-x-4">
                                        <div class=" w-14 h-14 image-fit zoom-in">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                src="{{ $item->options->image }}" title="{{ $item->name }}">
                                        </div>

                                        <div class="flex-1">
                                            <p>
                                                {{ $item->name }}
                                            </p>
                                            <p class="flex items-center">
                                                {{ $item->price }}
                                                <i data-lucide="dollar-sign" class="w-4"></i>
                                            </p>
                                        </div>

                                        <div>
                                            <p>
                                                {{ $item->qty }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <hr class="my-4">

                            <div class="flex justify-between">
                                <p class="text-lg">
                                    Subtotal
                                </p>
                                <p class="flex items-center">
                                    {{ Cart::instance('shopping')->subtotal() }}
                                    <i data-lucide="dollar-sign" class="w-4"></i>
                                </p>
                            </div>

                            <div class="flex justify-between">
                                <p class="text-lg tooltip flex items-center"
                                    title="El precio se calcúla según la dirección del envío">
                                    Precio de envío
                                    <i data-lucide="alert-circle" class="w-4 ml-2"></i>
                                </p>
                                <p class="flex items-center">
                                    3
                                    <i data-lucide="dollar-sign" class="w-4"></i>
                                </p>
                            </div>

                            <hr class="my-3">

                            <div class="flex justify-between mb-4">
                                <p class="text-lg">
                                    Total
                                </p>
                                <p class="flex items-center">
                                    {{ Cart::instance('shopping')->subtotal() + 3 }}
                                    <i data-lucide="dollar-sign" class="w-4"></i>
                                </p>
                            </div>
                        </div>
                    </section>

                    <button onclick="openForm()" class="intro-y btn btn-primary w-full">
                        {{ __('Finalizar pedido') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>

        <script type="text/javascript">
            function openForm() {
                VisanetCheckout.configure({
                    sessiontoken: "{{$session_token}}",
                    channel: 'web',
                    merchantid: "{{config('services.niubiz.merchand_id')}}",
                    purchasenumber: "2020100901",
                    amount: {{Cart::instance('shopping')->subtotal()}},
                    expirationminutes: '20',
                    timeouturl: 'about:blank',
                    merchantlogo: 'img/comercio.png',
                    formbuttoncolor: '#000000',
                    action: 'paginaRespuesta',
                    complete: function(params) {
                        alert(JSON.stringify(params));
                    }
                });
                VisanetCheckout.open();
            }
        </script>
    @endpush

</x-client-layout>
