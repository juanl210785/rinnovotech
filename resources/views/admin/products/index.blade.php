<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Products'),
    ],
]">       

        <!-- BEGIN: Data List -->
        <x-list-element :theads="[
            [
                'name' => __('Image'),
            ],
            [
                'name' => __('Name'),
            ],
            [
                'name' =>  __('Stock'),
            ],
            [
                'name' => __('Price'),
            ],            
            [
                'name' => __('Status'),
            ],
            [
                'name' => __('Category'),
            ],
            [
                'name' => __('Family'),
            ],
            [
                'name' => __('Actions'),
            ],
        ]" :products="$products">
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
                            class="font-medium whitespace-nowrap">{{ Str::limit($product->name, 10, '...') }}</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                            {{ __('Subcategory') . ': ' . $product->subcategory->name }}</div>
                    </td>
                    <td class="text-center"></td>
                    <td class="text-center">${{ $product->price }}</td>
                    <td class="w-40">

                        @if ($product->status == 'Activo')
                            <div class="flex items-center justify-center text-success"> <i data-lucide="check-square"
                                    class="w-4 h-4 mr-2"></i> {{ __('Active') }}
                            </div>
                        @else
                            <div class="flex items-center justify-center text-danger"> <i data-lucide="check-square"
                                    class="w-4 h-4 mr-2"></i> {{ __('Inactive') }}
                            </div>
                        @endif
                    </td>
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
        </x-list-element>
        <!-- END: Data List -->
</x-app-layout>
