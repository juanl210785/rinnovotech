<div>
    <header class="bg-primary dark:bg-transparent intro-x">
        <x-container class="px-4 py-4">
            <div class="flex justify-between space-x-8 items-center">
                <button class="text-2xl md:text-3xl text-white">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h1 class="text-white">
                    <a href="/" class="inline-flex flex-col items-end">
                        <span class="text-xl md:text-3xl leading-4 md:leading-6 font-semibold">Ecommerce</span>
                        <span class="text-xs">Tienda online</span>
                    </a>
                </h1>

                <div class="flex-1 hidden md:block">
                    <input type="text" class="form-control w-full" placeholder="Buscar por producto">
                </div>

                @if (Route::has('login'))
                    <div class="flex items-center space-x-4 md:space-x-8">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-xl md:text-3xl text-white">
                                <i class="fa-solid fa-gauge"></i></a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-xl md:text-3xl text-white"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-xl md:text-3xl text-white"><i
                                    class="fa-solid fa-right-to-bracket"></i></a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-xl md:text-3xl text-white"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <div class="mt-2 md:hidden">
                <input type="text" class="form-control text-xs" placeholder="Buscar por producto">
            </div>
        </x-container>
    </header>

    <div class="fixed top-0 left-0 inset-0 bg-primary bg-opacity-25 z-[80]"></div>

    <div class="fixed top-0 left-0 z-[100]">
        <div class="flex ">
            <div class="w-80 h-screen bg-secondary">
                <div class="px-4 py-3 font-semibold bg-primary text-white">
                    <div class="flex justify-between items-center">
                        <span class="text-lg">
                            {{ __('Families') }}
                        </span>
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="h-[calc(100vh-52px)] overflow-auto">
                    <ul>
                        @foreach ($families as $family)
                            <li>
                                <a href=""
                                    class="flex items-center justify-between px-4 py-4 text-gray-700 hover:bg-green-400">
                                    {{ $family->name }}
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
