<x-app-layout>
    <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
            <div class="box p-5 zoom-in">
                <div class="flex items-center">
                    <div class="w-2/4 flex-none">
                        <div class="text-lg font-medium truncate">{{ __('Welcome') . ': ' . auth()->user()->name }}
                        </div>
                        <div class="text-slate-500 mt-1">
                            {{ auth()->user()->email }}
                        </div>
                        <div class="text-slate-500 mt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="flex-none ml-auto relative">
                        <div class="w-[90px] h-[90px]">
                            <canvas id="report-donut-chart-1"></canvas>
                        </div>
                        <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                            20%</div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
            <div class="box p-5 zoom-in">
                <div class="flex">
                    <div class="text-lg font-medium truncate mr-3">Social Media</div>
                    <div
                        class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">
                        320 Followers</div>
                </div>
                <div class="mt-1">
                    <div class="h-[58px]">
                        <canvas class="simple-line-chart-1 -ml-1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
