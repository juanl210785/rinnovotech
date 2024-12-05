<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('build/assets/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite('resources/css/app.css')
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    {{-- Styles --}}
    @livewireStyles

</head>

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="{{ asset('img/tienda.png') }}">
                    <span class="text-white text-lg ml-3">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Icewall Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('img/tienda.png') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        {{ __('The most reliable e-commerce') }}</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70">Administra todas tus cuentas de
                        comercio electrónico <br> en un solo lugar</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            {{ $slot }}
            <!-- END: Login Form -->
        </div>
    </div>
    {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}

    @include('../layout/components/dark-mode-switcher')
    {{-- @include('../layout/components/main-color-switcher') --}}

    <!-- BEGIN: JS Assets-->
    @vite('resources/js/app.js')
    <!-- END: JS Assets-->

    {{-- Scripts --}}
    @livewireScripts

</body>

</html>
