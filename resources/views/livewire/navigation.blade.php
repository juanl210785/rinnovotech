<div x-data="{ open: false }">
    {{-- Cabecera --}}
    <header class="bg-emerald-700 dark:bg-slate-900 intro-y">
        <x-container class="px-4 py-4">
            <div class="flex justify-between space-x-8 items-center">
                {{-- Boton menu --}}
                <button class="text-2xl md:text-3xl text-white" x-on:click="open = true">
                    <i data-lucide="menu"></i>
                </button>

                {{-- Logo --}}
                <h1 class="text-white">
                    <a href="/" class="flex justify-between items-center">
                        <img alt="Midone - HTML Admin Template" class="w-8 mr-4" src="{{ asset('img/tienda.png') }}">
                        <div class="inline-flex flex-col items-end">
                            <span
                                class="text-xl md:text-3xl leading-4 md:leading-6 font-semibold">{{ config('app.name', 'Eccomerce') }}</span>
                            <span class="text-xs">Tienda online</span>
                        </div>
                    </a>
                </h1>

                {{-- Input busqueda --}}
                <div class="flex-1 hidden md:block">
                    <input type="text" oninput="search(this.value)" class="form-control w-full"
                        placeholder="Buscar por producto">
                </div>

                {{-- Desplegable del usuario --}}
                <div class="flex items-center space-x-4 md:space-x-8">
                    <x-dropdown-jl>
                        <x-slot name="boton">
                            <button class="dropdown-toggle" aria-expanded="false" data-tw-toggle="dropdown">
                                <span class="text-xl md:text-3xl text-white"> <i data-lucide="user"></i></a>
                                </span>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @auth
                                <x-dropdown-link-jl href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    <i data-lucide="home" class="w-4 h-4 mr-2"></i> {{ __('Dashboard') }}
                                </x-dropdown-link-jl>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link-jl href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        <i data-lucide="log-out" class="w-4 h-4 mr-2"></i>{{ __('Log Out') }}
                                    </x-dropdown-link-jl>
                                </form>
                            @else
                                <x-dropdown-link-jl href="{{ route('login') }}" class="dropdown-item">
                                    <i data-lucide="log-in" class="w-4 h-4 mr-2"></i> {{ __('Login') }}
                                </x-dropdown-link-jl>
                                <x-dropdown-link-jl href="{{ route('register') }}" class="dropdown-item">
                                    <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> {{ __('Register') }}
                                </x-dropdown-link-jl>
                            @endauth

                        </x-slot>
                    </x-dropdown-jl>
                    <a href="#" class="relative">
                        <i data-lucide="shopping-cart" class="text-xl md:text-3xl text-white"></i>
                        @if (Cart::instance('shopping')->count())
                            <span id="cart-count"
                                class="text-xs font-bold text-white absolute -top-2 -end-4 inline-flex w-5 h-5 items-center justify-center bg-red-500 rounded-full">
                                {{ Cart::instance('shopping')->count() }}
                            </span>
                        @endif
                    </a>

                </div>
            </div>

            {{-- Input busqueda movil --}}
            <div class="mt-2 md:hidden">
                <input type="text" oninput="search(this.value)" class="form-control text-xs"
                    placeholder="Buscar por producto">
            </div>
        </x-container>
    </header>

    {{-- Cubridor --}}
    <div x-show="open" style="display: none" x-on:click="open = false"
        class="fixed top-0 left-0 inset-0 bg-emerald bg-opacity-50 z-[80]"></div>

    {{-- Barra lateral --}}
    <div x-show="open" style="display: none" class="fixed top-0 left-0 z-[100]">
        <div class="flex ">
            <div class="w-screen md:w-80 h-screen bg-secondary dark:bg-slate-900">
                <div class="px-4 py-6 bg-emerald-900 text-white dark:bg-slate-800">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold">
                            {{ __('Families') }}
                        </span>
                        <button x-on:click="open = false">
                            <i data-lucide="x"></i>
                        </button>
                    </div>
                </div>
                <div class="h-[calc(100vh-52px)] overflow-auto">
                    {{-- Familias --}}
                    <ul>
                        @foreach ($families as $family)
                            <li wire:mouseover="$set('family_id', {{ $family->id }})" class="intro-y">
                                <a href="{{ route('families.show', $family) }}" class="side-menu">

                                    <div
                                        class="side-menu__title flex items-center justify-between px-4 py-4 hover:bg-emerald-600 dark:hover:bg-slate-600">
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
                <div class="bg-secondary dark:bg-slate-900 h-[calc(100vh-52px)] overflow-auto px-6 py-8">

                    <div class="mb-8 flex justify-between items-center">
                        <p class="text-lg font-medium mr-auto uppercase">{{ $this->familyName }}</p>
                        <a href="{{ route('families.show', $family_id) }}"
                            class="block btn btn-sm btn-primary w-24 mr-1 mb-2">{{ __('See all') }}</a>
                    </div>

                    {{-- Categorias --}}
                    <ul class="grid grid-cols-1 xl:grid-cols-3 gap-8 intro-y">
                        @foreach ($this->categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category) }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5 bg-emerald-800 text-slate-50">
                                            <div class="flex items-center">
                                                <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </div>

                                </a>
                                {{-- Subcategorias --}}
                                <ul class="mt-5 space-y-2">
                                    @foreach ($category->subcategories as $subcategory)
                                        <li>
                                            <a href="{{ route('subcategories.show', $subcategory) }}">
                                                <div class="box px-2 py-2 mb-2 flex items-center zoom-in">
                                                    <i data-lucide="list" class="w-4 h-4 mr-2"></i>
                                                    {{ $subcategory->name }}
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            let debounceTimer;

            Livewire.on('cartUpdated', (count) => {
                document.getElementById('cart-count').innerText = count;
            })

            function search(value) {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    Livewire.emit('search', value);
                }, 300); // Espera 300ms antes de emitir
            }
        </script>
    @endpush
</div>
