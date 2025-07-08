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

    <div class="grid grid-cols-12 gap-6 mt-5 mb-8">
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

    </div>

    @if ($covers->count())
        <ul class="intro-y" id="covers">
            @foreach ($covers as $cover)
                <li data-id="{{ $cover->id }}" class="box px-2 py-2 mb-3 flex items-center zoom-in cursor-move">
                    <div class="w-20 md:w-40 h-20 flex-none image-fit rounded-md overflow-hidden">
                        <img alt="Midone - HTML Admin Template" src="{{ $cover->image }}">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium">{{ $cover->title }}</div>
                        <div class="text-slate-500 text-xs mt-0.5">
                            {{ __('Start at') . ' ' . $cover->start_at->diffForHumans() }}</div>
                        <div
                            class="flex items-center cursor-pointer mt-2 {{ $cover->is_active ? 'text-success' : 'text-danger' }} ">
                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> <a
                                href="{{ route('admin.covers.status', $cover) }}">
                                {{ $cover->is_active ? 'Activo' : 'Inactivo' }}
                            </a>
                        </div>

                    </div>
                    <div class="flex-col justify-center">
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white font-medium">
                            {{ $cover->end_at ? __('End at') . ' ' . $cover->end_at->diffForHumans() : __('End at') . ' Indefinido' }}
                        </div>
                        <a href="{{ route('admin.covers.edit', $cover) }}"
                            class="btn btn-sm btn-secondary w-24 mt-2">{{ __('Edit') }}</a>
                    </div>
                </li>
            @endforeach
        </ul>
        <!-- END: Blog Layout -->
        <!-- BEGIN: Pagination -->
        {{ $covers->appends(request()->all())->links('vendor.pagination.tailwind') }}
        <!-- END: Pagination -->
    @else
    @endif


    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.6/Sortable.min.js"></script>
        <script>
            new Sortable(covers, {
                animation: 150,
                ghostClass: 'bg-emerald-400',
                store: {
                    set: (sortable) => {
                        const sorts = sortable.toArray();
                        axios.post("{{ route('api.sort.covers') }}", {
                            sorts: sorts
                        }).catch((error) => {
                            console.log(error);
                        })
                    }
                }
            });
        </script>
    @endpush

</x-app-layout>
