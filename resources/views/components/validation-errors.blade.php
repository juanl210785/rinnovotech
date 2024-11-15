@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'alert alert-danger alert-dismissible show flex items-center justify-center mb-2 mt-2']) }}
        role="alert">
        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i>
        <ul class="">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>
@endif
