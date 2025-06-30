<div>
    <header class="bg-primary dark:bg-transparent intro-x">
        <x-container class="px-4 py-4">
            <div class="flex space-x-8 items-center">
                <button class=" text-3xl text-white">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h1 class="text-white">
                    <a href="/" class="inline-flex flex-col items-end">
                        <span class="text-3xl leading-6 font-semibold">Ecommerce</span>
                        <span class="text-xs">Tienda online</span>
                    </a>
                </h1>

                <div class="flex-1">
                    <input type="text" class="form-control w-full" placeholder="Buscar por producto">
                </div>

                @if (Route::has('login'))
                    <div class="space-x-8">
                        @auth
                            
                        @else
                            <a href="{{ route('login') }}"
                                class="text-3xl text-white"><i class="fa-solid fa-right-to-bracket"></i></a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-3xl text-white"><i class="fa-solid fa-cart-shopping"></i></a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </x-container>
    </header>
</div>
