<x-app-layout :breadcrumbs="[
    [
        'name' => __('Dashboard'),
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => __('Categories'),
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => $category->name,
    ],
]">

    <div class="intro-y flex items-center justify-between mt-8 mb-8">
        <h2 class="text-lg font-medium mr-auto">
            Crear una nueva categoría de producto
        </h2>
    </div>

    <div class="box intro-y p-8">

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" id="edit-category-form">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-input-label for="regular-form-1" class="form-label">Familia de producto</x-input-label>

                <div>
                    <div class="mt-2">
                        <select id="family_id" data-placeholder="Seleccione la familia" class="tom-select w-full"
                            name="family_id" required>
                            <option value="" selected>Seleccione la familia</option>
                            @foreach ($families as $family)
                                <option value="{{ $family->id }}" @selected(old('family_id', $category->family->id) == $family->id)>{{ $family->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <x-input-label for="regular-form-1" class="form-label">Nombre de la Categoría</x-input-label>
                <x-text-input id="name" name="name" type="text" value="{{ old('name', $category->name) }}"
                    class="form-control" required />
            </div>

            <div class="mt-2 flex justify-end">
                <!-- BEGIN: Modal Toggle -->
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal"
                        data-tw-target="#delete-modal-preview" class="btn btn-danger">{{ __('Delete') }}</a> </div>
                <!-- END: Modal Toggle -->
                <button id="success-notification-toggle" type="submit"
                    class="btn btn-primary ml-2">{{ __('Update') }}</button>

            </div>
        </form>
    </div>

    <!-- BEGIN: Notification Content -->
    <x-notification-success>
        <x-slot name="title">
            {{ __('Success') }}
        </x-slot>

        {{ __('Category edited successfully') }}
    </x-notification-success>
    <!-- END: Notification Content -->

    <form action="{{ route('admin.categories.destroy', $category) }}" method="post" id="form-delete">
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
            document.getElementById('edit-category-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Evitar el envío tradicional del formulario

                const formData = new FormData(this);
                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Mostrar notificación de éxito
                            document.getElementById('success-notification-content').classList.remove('hidden');
                        } else {
                            alert('Hubo un error al crear la categoría.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al procesar tu solicitud.');
                    });
            });
        </script>

        <script>
            function confirmDelete() {
                document.getElementById('form-delete').submit();
            }
        </script>
    @endpush

</x-app-layout>
