@php
    $links = [
        [
            'name' => __('Dashboard'),
            'icon' => 'home',
            'active' => request()->routeIs('admin.dashboard'),
            'route' => 'admin.dashboard',
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
    ];
@endphp
<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('img/tienda.png') }}">
        <span class="hidden xl:block text-white text-lg ml-3">
            Tinker
        </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        {{-- Ejemplo link con sub-menu --}}
        {{-- <li>
            <a href="javascript:;.html" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    {{ __('Dashboard') }}
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="side-menu-light-dashboard-overview-1.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 3 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-4.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 4 </div>
                    </a>
                </li>
            </ul>
        </li> --}}
        @foreach ($links as $link)
            <li>
                <a href="{{ route($link['route']) }}" class="side-menu {{ $link['active'] ? 'side-menu--active' : '' }} ">
                    <div class="side-menu__icon"> <i data-lucide="{{ $link['icon'] }}"></i> </div>
                    <div class="side-menu__title"> {{ $link['name'] }} </div>
                </a>
            </li>
        @endforeach

        {{-- @foreach ($side_menu as $menuKey => $menu)
            @if ($menu == 'devider')
                <li class="side-nav__devider my-6"></li>
            @else
                <li>
                    <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}"
                        class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                        <div class="side-menu__icon">
                            <i data-lucide="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <div
                                    class="side-menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}">
                                    <i data-lucide="chevron-down"></i>
                                </div>
                            @endif
                        </div>
                    </a>
                    @if (isset($menu['sub_menu']))
                        <ul class="{{ $first_level_active_index == $menuKey ? 'side-menu__sub-open' : '' }}">
                            @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                <li>
                                    <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], $subMenu['params']) : 'javascript:;' }}"
                                        class="{{ $second_level_active_index == $subMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                        <div class="side-menu__icon">
                                            <i data-lucide="activity"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            {{ $subMenu['title'] }}
                                            @if (isset($subMenu['sub_menu']))
                                                <div
                                                    class="side-menu__sub-icon {{ $second_level_active_index == $subMenuKey ? 'transform rotate-180' : '' }}">
                                                    <i data-lucide="chevron-down"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                    @if (isset($subMenu['sub_menu']))
                                        <ul
                                            class="{{ $second_level_active_index == $subMenuKey ? 'side-menu__sub-open' : '' }}">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                <li>
                                                    <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], $lastSubMenu['params']) : 'javascript:;' }}"
                                                        class="{{ $third_level_active_index == $lastSubMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                                        <div class="side-menu__icon">
                                                            <i data-lucide="zap"></i>
                                                        </div>
                                                        <div class="side-menu__title">
                                                            {{ $lastSubMenu['title'] }}</div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach --}}
    </ul>
</nav>
