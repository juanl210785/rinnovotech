@props(['breadcrumbs' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('img/tienda.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Tostify CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- BEGIN: CSS Assets-->
    @vite('resources/css/app.css')
    <!-- END: CSS Assets-->

    {{-- Styles --}}
    @livewireStyles

    {{-- Vue.js --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
</head>

<body class="py-5 md:py-0 bg-black/[0.15]">
    @include('../layout/components/mobile-menu')
    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">

        <!-- BEGIN: Side Menu -->
        @include('layouts.partials.app.side_bar');
        <!-- END: Side Menu -->

        <!-- BEGIN: Content -->
        <div class="content">
            @include('layouts.partials.app.navigation')
            {{ $slot }}
        </div>
        <!-- END: Content -->
    </div>

    @include('../layout/components/dark-mode-switcher')
    {{-- @include('../layout/components/main-color-switcher') --}}

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    {{-- Tostify js --}}
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @vite('resources/js/app.js')
    <!-- END: JS Assets-->

    {{-- Scripts --}}
    @livewireScripts

    {{-- My Script --}}

    @stack('js')

    @if (session('notification'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Clonar y actualizar el contenido con el mensaje de la sesión flash
                var notificationContent = $("#success-notification-content").clone().removeClass("hidden");

                // Mostrar la notificación
                Toastify({
                    node: notificationContent[0],
                    duration: 10000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                }).showToast();
            });
        </script>
    @endif
</body>

</html>
