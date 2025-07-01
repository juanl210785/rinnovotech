<div>
    <header class="bg-primary dark:bg-transparent intro-y">
        <x-container class="px-4 py-4">
            <div class="flex justify-between space-x-8 items-center">
                <button class="text-2xl md:text-3xl text-white">
                    <i data-lucide="menu"></i>
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
                            <a href="{{ route('admin.dashboard') }}" class="text-xl md:text-3xl text-white">
                                <i data-lucide="home"></i></a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-xl md:text-3xl text-white"><i
                                        data-lucide="shopping-cart"></i></a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-xl md:text-3xl text-white"><i
                                    data-lucide="log-in"></i></a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-xl md:text-3xl text-white"><i
                                        data-lucide="shopping-cart"></i></a>
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
            <div class="w-screen md:w-80 h-screen bg-secondary">
                <div class="px-4 py-3 font-semibold bg-primary text-white intro-x">
                    <div class="flex justify-between items-center">
                        <span class="text-lg">
                            {{ __('Families') }}
                        </span>
                        <button>
                            <i data-lucide="x"></i>
                        </button>
                    </div>
                </div>
                <div class="h-[calc(100vh-52px)] overflow-auto">
                    {{-- $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' --}}
                    <ul>
                        @foreach ($families as $family)
                            <li wire:mouseover="$set('family_id', {{ $family->id }})" class="intro-y">
                                <a href="javascript:;" class="side-menu">

                                    <div
                                        class="side-menu__title flex items-center justify-between px-4 py-4 hover:bg-green-400">
                                        {{ $family->name }}
                                        <div class="side-menu__sub-icon">
                                            <i data-lucide="chevron-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-80 xl:w-[57rem] pt-[52px] hidden md:block">
                <div class="bg-secondary h-[calc(100vh-52px)] overflow-auto px-6 py-8">
                    <ul class=" grid grid-cols-3 gap-8 intro-y">
                        @foreach ($this->categories as $category)
                            <li>
                                <a href="">
                                    <div class="box">
                                        <div class="p-5">
                                            <div class="text-slate-600">
                                                <div class="flex items-center">
                                                    <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
                                                    {{ $category->name }}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
