<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Options'),
    ],
]">

    @if (session('notification'))
        <x-notification clase="{{ session('notification.clase') }}" lucide="{{ session('notification.lucide') }}">
            <x-slot name="title">
                {{ session('notification.title') }}
            </x-slot>
            {{ session('notification.message') }}
        </x-notification>
    @endif

    <div>
        <i class="fi fi-brands-instagram mr-1"></i>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="512" height="512">
            <g id="_01_align_center" data-name="01 align center">
                <polygon points="13 11 13 6 11 6 11 11 6 11 6 13 11 13 11 18 13 18 13 13 18 13 18 11 13 11" />
            </g>
        </svg>

        <i class="fi fi-brands-instagram"></i>
        {{-- <i class="fi fi-br-plus-small"></i> --}}
        Hello
    </div>

    @livewire('admin.options.manage-options')
</x-app-layout>
