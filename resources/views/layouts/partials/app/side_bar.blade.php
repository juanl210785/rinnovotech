@php
    $links = [
        [
            'name' => __('Dashboard'),
            'icon' => 'home',
            'active' => request()->routeIs('admin.dashboard'),
            'route' => 'admin.dashboard',
        ],
        [
            'name' => __('Options'),
            'icon' => 'sliders',
            'active' => request()->routeIs('admin.options.*'),
            'route' => 'admin.options.index',
        ],
        [
            'name' => __('Profile'),
            'icon' => 'users',
            'active' => request()->routeIs('profile.*'),
            'route' => 'admin.profile.edit',
        ],
        [
            'name' => __('Families'),
            'icon' => 'layers',
            'active' => request()->routeIs('admin.families.*'),
            'route' => 'admin.families.index',
        ],
        [
            'name' => __('Categories'),
            'icon' => 'list',
            'active' => request()->routeIs('admin.categories.*'),
            'route' => 'admin.categories.index',
        ],
        [
            'name' => __('Subcategories'),
            'icon' => 'minus',
            'active' => request()->routeIs('admin.subcategories.*'),
            'route' => 'admin.subcategories.index',
        ],
        [
            'name' => __('Products'),
            'icon' => 'shopping-bag',
            'active' => request()->routeIs('admin.products.*'),
            'route' => 'admin.products.index',
        ],
    ];
@endphp
<nav class="side-nav">
    <a href="/" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('img/tienda.png') }}">
        <span class="hidden xl:block text-white text-lg ml-3">
            {{ config('app.name', 'Eccomerce') }}
        </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>

        @foreach ($links as $link)
            <li>
                <a href="{{ route($link['route']) }}" class="side-menu {{ $link['active'] ? 'side-menu--active' : '' }} ">
                    <div class="side-menu__icon"> <i data-lucide="{{ $link['icon'] }}"></i> </div>
                    <div class="side-menu__title"> {{ $link['name'] }} </div>
                </a>
            </li>
        @endforeach

    </ul>
</nav>
