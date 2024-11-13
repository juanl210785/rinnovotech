<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Families'),
        'route' => route('admin.families.index'),
    ],
    [
        'name' => $family->name,
    ],
]">

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            Editar la familia: {{ $family->name }}
        </h2>
    </div>
    <div class="box intro-y p-8">
        <form action="{{ route('admin.families.update', $family) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="regular-form-1" class="form-label">Nombre de la Familia</x-input-label>
                <x-text-input id="regular-form-1" name="name" type="text" value="{{ old('name', $family->name) }}"
                    class="form-control" required />
            </div>

            <div class="mt-2 flex justify-end">
                <!-- BEGIN: Modal Toggle -->
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal"
                        data-tw-target="#delete-modal-preview" class="btn btn-danger">{{ __('Delete') }}</a> </div>
                <!-- END: Modal Toggle -->
                <x-button-submit class="ml-2">
                    {{ __('Update') }}
                </x-button-submit>
            </div>
        </form>
    </div>

    <form action="{{ route('admin.families.destroy', $family) }}" method="post" id="form-delete">
        @csrf
        @method('DELETE')
    </form>


    <!-- BEGIN: Modal Content -->
    <x-modal-delete>
        <x-slot name="action">
            <button type="button" class="btn btn-danger w-24" onclick="confirmDelete()">
                {{ __('Delete') }}
            </button>
        </x-slot>
    </x-modal-delete>
    <!-- END: Modal Content -->

    @push('js')
        <script>
            function confirmDelete() {
                document.getElementById('form-delete').submit();
            }
        </script>
    @endpush
</x-app-layout>
