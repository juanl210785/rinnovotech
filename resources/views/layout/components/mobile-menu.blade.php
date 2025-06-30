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

<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('build/assets/images/logo.svg') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
        <ul class="scrollable__content py-2">
             @foreach ($links as $link)
            <li>
                <a href="{{ route($link['route']) }}" class="side-menu {{ $link['active'] ? 'menu menu--active' : 'menu' }} ">
                    <div class="menu__icon"> <i data-lucide="{{ $link['icon'] }}"></i> </div>
                    <div class="menu__title"> {{ $link['name'] }} </div>
                </a>

                
            </li>
        @endforeach
        </ul>
    </div>
</div>
<!-- END: Mobile Menu -->
                