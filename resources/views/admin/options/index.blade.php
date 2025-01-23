<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Options'),
    ],
]">

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ __('Options') }}
        </h2>

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                class="btn btn-primary"><i data-lucide="plus" class="mr-1"></i>{{ __('Create') }}</a>
        </div>
        <!-- END: Modal Toggle -->
    </div>

    @livewire('admin.options.manage-options')
</x-app-layout>
