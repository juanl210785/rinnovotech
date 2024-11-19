@props(['theads' => [], 'products'])

<div class="grid grid-cols-12 gap-6 mt-5">

    {{-- Cabecera --}}
    <x-cabecera :products="$products"/>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    @foreach ($theads as $item)
                        <th class="{{ $loop->first ? '' : ($loop->iteration == 2 ? '' : 'text-center') }} whitespace-nowrap">{{ $item['name'] }}</th>
                    @endforeach                    
                </tr>
            </thead>
            <tbody>
                {{$slot}}
                

            </tbody>
        </table>
    </div>
    <!-- END: Data List -->

    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">

                @if ($products->onFirstPage())
                    <li class="page-item">
                        <button disabled class="page-link" href="#"> <i class="w-4 h-4"
                                data-lucide="chevron-left"></i> </button>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}"> <i class="w-4 h-4"
                                data-lucide="chevron-left"></i> </a>
                    </li>
                @endif

                @foreach ($products->links()->elements as $element)
                    @if (is_string($element))
                        <li class="page-item"> <a class="page-link" href="#">{{ $element }}</a> </li>
                    @endif


                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $products->currentPage())
                                <li class="page-item active"> <a class="page-link"
                                        href="#">{{ $page }}</a> </li>
                            @else
                                <li class="page-item"> <a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a> </li>
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
                        <button disabled class="page-link"> <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </button>
                    </li>
                @endif


            </ul>
        </nav>

        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->



</div>
