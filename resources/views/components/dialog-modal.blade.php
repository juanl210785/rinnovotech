@props(['id' => null, 'maxWidth' => null])

<x-modal-jl :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 text-right">
        {{ $footer }}
    </div>
</x-modal-jl>
