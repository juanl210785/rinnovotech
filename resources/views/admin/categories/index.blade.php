<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Categories'),
    ],
]">
    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            Categorias de productos
        </h2>
        <x-link-button href="{{ route('admin.categories.create') }}" class="flex items-center">
            <i data-lucide="plus"></i>
            <span class="ml-1">{{ __('Create') }}</span>
        </x-link-button>
    </div>

    <div class="box intro-y p-8">

        {{ session('success') }}

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Nombre</th>
                        <th class="whitespace-nowrap">Familia</th>
                        <th class="whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="whitespace-nowrap">{{ $category->id }}</td>
                            <td class="whitespace-nowrap">{{ $category->name }}</td>
                            <td class="whitespace-nowrap">{{ $category->family->name }}</td>
                            <td class="whitespace-nowrap">
                                <a href="{{ route('admin.categories.edit', $category) }}">{{ __('Edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- BEGIN: Notification Content -->
        <x-notification-success>
            <x-slot name="title">
                {{ __('Success') }}
            </x-slot>

            {{ session('success') ? __(session('success')) : __('Category created successfully') }}
        </x-notification-success>
        <!-- END: Notification Content -->
        <div class="mt-8">
            {{ $categories->links() }}
        </div>
    </div>

    {{-- @if (session('success'))
        @push('js')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Toastify({
                        node: document.getElementById("success-notification-content")
                            .cloneNode(true)
                            .classList.remove("hidden"),
                        text: "{{ session('success') }}",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                    }).showToast();
                });
            </script>
        @endpush
    @endif --}}


</x-app-layout>
