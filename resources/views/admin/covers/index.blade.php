<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Covers'),
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

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ __('Covers') }}
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            {{-- start boton crear --}}
            <x-link-button href="{{ route('admin.covers.create') }}" class="flex items-center shadow-md mr-2">
                <i data-lucide="plus"></i>
                <span class="ml-1">{{ __('Create') }}</span>
            </x-link-button>
            {{-- end boton crear --}}

            {{-- start dropdown --}}
            <x-dropdown-jl>
                <x-slot name="boton">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                data-lucide="plus"></i>
                        </span>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link-jl class="dropdown-item">
                        <i data-lucide="printer" class="w-4 h-4 mr-2"></i> {{ __('Print') }}
                    </x-dropdown-link-jl>

                    <x-dropdown-link-jl class="dropdown-item">
                        <i data-lucide="external-link" class="w-4 h-4 mr-2"></i> Excel
                    </x-dropdown-link-jl>

                    <x-dropdown-link-jl class="dropdown-item">
                        <i data-lucide="archive" class="w-4 h-4 mr-2"></i> PDF
                    </x-dropdown-link-jl>
                </x-slot>
            </x-dropdown-jl>
            {{-- end dropdown --}}

            {{-- start paginación --}}
            <x-show-result-pagination :paginator="$covers" />
            {{-- end paginación --}}

            {{-- start busqueda --}}
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="{{ __('Search') }}...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
            {{-- end busqueda --}}

        </div>

        <!-- BEGIN: Data List -->
        {{-- Debo crear un componente livewire --}}
        @if ($covers->count())
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <x-table-jl>
                    <x-slot name="thead">
                        <th class="whitespace-nowrap">{{ __('Image') }}</th>
                        <th class="whitespace-nowrap">{{ __('Title') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Start at') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('End at') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Status') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Actions') }}</th>
                    </x-slot>

                    <x-slot name="tbody">
                        @foreach ($covers as $cover)
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                src="{{ Storage::url($cover->image_path) }}"
                                                title="{{ $cover->title }}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.covers.edit', $cover) }}"
                                        class="font-medium whitespace-nowrap">{{ $cover->title }}</a>
                                </td>
                                <td class="text-center">{{ $cover->start_at->diffForHumans() }}</td>
                                <td class="text-center">{{ $cover->end_at->diffForHumans() }}</td>
                                <td class="w-40">
                                    <div
                                        class="flex items-center justify-center {{ $cover->is_active ? 'text-success' : 'text-danger' }} ">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> <a href="">
                                            {{ $cover->is_active ? 'Activo' : 'Inactivo' }}
                                        </a>
                                    </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                            href="{{ route('admin.covers.edit', $cover) }}">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{ __('Edit') }}
                                        </a>

                                        <a href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#delete-modal-preview"
                                            class="flex items-center text-danger">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> {{ __('Delete') }}
                                        </a>

                                        <form action="{{ route('admin.covers.destroy', $cover) }}" method="post"
                                            id="form-delete">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table-jl>
            </div>
        @else
        @endif
        <!-- END: Data List -->

        <!-- BEGIN: Pagination -->
        {{ $covers->links() }}
        <!-- END: Pagination -->
    </div>

</x-app-layout>
