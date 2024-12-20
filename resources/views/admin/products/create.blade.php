<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Products'),
        'route' => route('admin.products.index'),
    ],
    [
        'name' => __('New'),
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

    {{-- 
 --}}
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ __('Add Product') }}</h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">
        <!-- BEGIN: Notification -->
        <div class="intro-y col-span-11 alert alert-primary alert-dismissible show flex items-center mb-6" role="alert">
            <span><i data-lucide="info" class="w-4 h-4 mr-2"></i></span>
            <span>{{ __('Starting Jan 01, 2025, there will be changes to the Terms & Conditions regarding the number of products that may be added by the Seller.') }}<a
                    href="https://themeforest.net/item/midone-jquery-tailwindcss-html-admin-template/26366820"
                    class="underline ml-1" target="blank">{{ __('Learn More') }}</a></span>
            <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
        <!-- END: Notification -->

        <div class="intro-y col-span-11 2xl:col-span-9">

            @livewire('admin.products.products-create')

            {{-- Aqui va la parte 1 --}}
        </div>

        {{-- Aqui va parte 2 --}}
    </div>

    @push('js')
        <script src="resources/js/ckeditor-classic.js"></script>


        {{-- <script>
            document.addEventListener('DOMContentLoaded',
                function() {
                    // Clonar y actualizar el contenido de la notificación 
                    var notificationContent = document.querySelector("#success-notification-content").cloneNode(true);
                    notificationContent.classList.remove("hidden");

                    // Mostrar la notificación 
                    Toastify({
                        node: notificationContent,
                        duration: 5000,
                        close: true,
                        gravity: "top", // `top` or `bottom` 
                        position: "right", // `left`, `center` or `right` 
                        stopOnFocus: true, // Previene el cierre al hacer hover 
                    }).showToast();
                });
        </script> --}}
    @endpush



</x-app-layout>
