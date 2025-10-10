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
                                    {{__('Credit card')}}                                     
                                </button>
                                <img class="w-40 h-8" src="{{asset('img/cerdit_card.png')}}" alt="">
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
                                    {{__('Mobile payment')}}
                                </button>
                                <img class="w-10 h-10" src="{{asset('img/pngegg.png')}}" alt="">
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
                                    {{__('PayPal')}}
                                </button>
                                <img class="w-10 h-10" src="{{asset('img/paypal.png')}}" alt="">
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
                                    {{__('Stripe')}}
                                </button>
                               <img class="w-18 h-10" src="{{asset('img/stripe.png')}}" alt="">
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
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam quod rem odit! Dolorem odit
                        quam
                        velit. Facilis magnam architecto voluptates expedita qui. Quisquam dolor tempora facilis
                        deleniti,
                        officia velit eius?</p>
                </div>
            </div>
        </div>
    </div>
</x-client-layout>
