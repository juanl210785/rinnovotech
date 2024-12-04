<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Products'),
    ],
]">

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ __('Products') }}
        </h2>
        <x-link-button href="{{ route('admin.products.create') }}" class="flex items-center">
            <i data-lucide="plus"></i>
            <span class="ml-1">{{ __('Create') }}</span>
        </x-link-button>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- boton crear --}}
            <button class="btn btn-primary shadow-md mr-2">Add New Product</button>
            {{-- dropdown --}}
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                                Print </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text"
                                    class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text"
                                    class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- paginación --}}
            <div class="hidden md:block mx-auto text-slate-500">
                @if ($products->hasPages())
                    <div class="flex-1 text-left">
                        <p class="text-sm text-gray-700 leading-5">
                            {!! __('Showing') !!}
                            @if ($products->firstItem())
                                <span class="font-medium">{{ $products->firstItem() }}</span>
                                {!! __('to') !!}
                                <span class="font-medium">{{ $products->lastItem() }}</span>
                            @else
                                {{ $products->count() }}
                            @endif
                            {!! __('of') !!}
                            <span class="font-medium">{{ $products->total() }}</span>
                            {!! __('results') !!}
                        </p>
                    </div>
                @endif
            </div>
            {{-- busqueda --}}
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('Image') }}</th>
                        <th class="whitespace-nowrap">{{ __('Name') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Stock') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Price') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Status') }}</th>
                        {{-- <th class="text-center whitespace-nowrap">{{ __('Subcategory') }}</th> --}}
                        <th class="text-center whitespace-nowrap">{{ __('Category') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Family') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                            src="{{ $product->image_path }}" title="{{ $product->name }}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href=""
                                    class="font-medium whitespace-nowrap">{{ Str::limit($product->name, 20) }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    {{ $product->subcategory->name }}</div>
                            </td>
                            <td class="text-center"></td>
                            <td class="text-center">${{ $product->price }}</td>
                            <td class="w-40">
                                @if ($product->status == 'Activo')
                                    <div class="flex items-center justify-center text-success"> <i
                                            data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ __('Active') }}
                                    </div>
                                @else
                                    <div class="flex items-center justify-center text-danger"> <i
                                            data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ __('Inactive') }}
                                    </div>
                                @endif
                            </td>
                            {{-- <td class="text-center">{{ $product->subcategory->name }}</td> --}}
                            <td class="text-center">{{ $product->subcategory->category->name }}</td>
                            <td class="text-center">{{ $product->subcategory->category->family->name }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square"
                                            class="w-4 h-4 mr-1"></i> {{ __('Edit') }} </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                            class="w-4 h-4 mr-1"></i> {{ __('Delete') }} </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

        <!-- BEGIN: Pagination -->
        @if ($products->hasPages())
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        {{-- <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                        </a>
                    </li> --}}
                        @if ($products->onFirstPage())
                            <li class="page-item">
                                <button disabled class="page-link"> <i class="w-4 h-4" data-lucide="chevron-left"></i>
                                </button>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}"> <i class="w-4 h-4"
                                        data-lucide="chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($products->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item active"> <button class="page-link">{{ $element }}</button>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $products->currentPage())
                                        <li class="page-item active"> <button
                                                class="page-link">{{ $page }}</button> </li>
                                    @else
                                        <li class="page-item"> <a class="page-link" href="{{ $url }}"
                                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}"> <i class="w-4 h-4"
                                        data-lucide="chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item">
                                <button disabled class="page-link"> <i class="w-4 h-4"
                                        data-lucide="chevron-right"></i>
                                </button>
                            </li>
                        @endif
                    </ul>
                </nav>
                <form method="GET" action="{{ route('admin.products.index') }}">
                    <select class="w-20 form-select box mt-3 sm:mt-0" name="pag" onchange="this.form.submit()">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="35">35</option>
                        <option value="50">50</option>
                    </select>
                </form>
                {{-- <select class="w-20 form-select box mt-3 sm:mt-0" name="pag">
                    <option value="10">10</option>
                    <option value="10">25</option>
                    <option value="10">35</option>
                    <option value="10">50</option>
                </select> --}}
            </div>
        @endif
        <!-- END: Pagination -->
    </div>

    {{-- <div class="box intro-y p-8">

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Nombre</th>
                        <th class="whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($families as $family)
                        <tr>
                            <td class="whitespace-nowrap">{{ $family->id }}</td>
                            <td class="whitespace-nowrap">{{ $family->name }}</td>
                            <td class="whitespace-nowrap">
                                <a href="{{ route('admin.families.edit', $family) }}">{{ __('Edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8">
            {{ $families->links() }}
        </div>
    </div> --}}
</x-app-layout>
