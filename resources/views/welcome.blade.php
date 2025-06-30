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

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/8904727aa4.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite('resources/css/app.css')

    {{-- Styles --}}
    @livewireStyles

</head>

<body class="py-5 md:py-0 bg-black/[0.15]">
    @livewire('navigation')

    @include('../layout/components/dark-mode-switcher')

    <!-- BEGIN: JS Assets-->
    @vite('resources/js/app.js')
    <!-- END: JS Assets-->

    {{-- Scripts --}}
    @livewireScripts

</body>

</html>
