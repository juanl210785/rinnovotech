<!-- BEGIN: Top Bar -->
<div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">

    <!-- BEGIN: Breadcrumb -->
    @include('layouts.partials.app.breadcrumb')

    <!-- END: Breadcrumb -->

    <!-- BEGIN: Search -->
    <div class="intro-x relative mr-3 sm:mr-6">

        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
            <i data-lucide="search" class="search__icon"></i>
        </div>

        <a class="notification sm:hidden" href="">
            <i data-lucide="search" class="notification__icon"></i>
        </a>

        <div class="search-result">
            <div class="search-result__content">

                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                    <a href="" class="flex items-center">
                        <div class="w-8 h-8 bg-success/20 text-success flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="inbox"></i>
                        </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="users"></i>
                        </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div
                            class="w-8 h-8 bg-primary/10 text-primary/80 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="credit-card"></i>
                        </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>

                <div class="search-result__content__title">Users</div>
                <div class="mb-5">
                    @foreach (array_slice($fakers, 0, 4) as $faker)
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full"
                                    src="{{ asset('build/assets/images/' . $faker['photos'][0]) }}">
                            </div>
                            <div class="ml-3">{{ $faker['users'][0]['name'] }}</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                {{ $faker['users'][0]['email'] }}</div>
                        </a>
                    @endforeach
                </div>

                <div class="search-result__content__title">Products</div>
                @foreach (array_slice($fakers, 0, 4) as $faker)
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('build/assets/images/' . $faker['images'][0]) }}">
                        </div>
                        <div class="ml-3">{{ $faker['products'][0]['name'] }}</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            {{ $faker['products'][0]['category'] }}</div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
    <!-- END: Search -->

    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
            aria-expanded="false" data-tw-toggle="dropdown">
            <i data-lucide="bell" class="notification__icon"></i>
        </div>
        <div class="notification-content pt-2 dropdown-menu">
            <div class="notification-content__box dropdown-content">
                <div class="notification-content__title">Notifications</div>
                @foreach (array_slice($fakers, 0, 5) as $key => $faker)
                    <div class="cursor-pointer relative flex items-center {{ $key ? 'mt-5' : '' }}">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('build/assets/images/' . $faker['photos'][0]) }}">
                            <div
                                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                            </div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;"
                                    class="font-medium truncate mr-5">{{ $faker['users'][0]['name'] }}</a>
                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ $faker['times'][0] }}
                                </div>
                            </div>
                            <div class="w-full truncate text-slate-500 mt-0.5">{{ $faker['news'][0]['short_content'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END: Notifications -->

    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
            aria-expanded="false" data-tw-toggle="dropdown">
            <span class="inline-flex rounded-md">
                <button type="button"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                    {{ Auth::user()->name }}

                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </span>
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-white/70 mt-0.5">{{ Auth::user()->email }}</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item hover:bg-white/5">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i> {{ __('Profile') }}
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i>
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
