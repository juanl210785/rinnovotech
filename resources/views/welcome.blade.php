<x-client-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush


    <!-- Slider main container -->
    <div class="swiper mb-12 intro-y">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->

            @foreach ($covers as $cover)
                <div class="swiper-slide">
                    <img src="{{ $cover->image }}" class="w-full aspect-[3/1] object-cover object-center" alt="">
                </div>
            @endforeach

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        {{-- <div class="swiper-scrollbar"></div> --}}
    </div>

    <x-container>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($lastProducts as $product)
                <div class="intro-y">
                    <div class="box">
                        <div class="p-5">
                            <div
                                class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{ $product->image }}">
                                @if ($product->condition == 'Usado')
                                    <span
                                        class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Usado</span>
                                @endif
                                <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                    <h1 class="text-xl font-medium leading-none line-clamp-2">{{ $product->name }}</h1>
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
                        <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60">
                            <a href="{{route('products.show', $product)}}" class="btn btn-rounded-primary w-full">{{ __('See more') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </x-container>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script>
            const swiper = new Swiper('.swiper', {
                // Optional parameters
                loop: true,
                autoplay: {
                    delay: 8000,
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                /* scrollbar: {
                    el: '.swiper-scrollbar',
                }, */
            });
        </script>
    @endpush
</x-client-layout>
