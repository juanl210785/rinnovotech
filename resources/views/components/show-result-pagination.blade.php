@props(['paginator'])

@if ($paginator->hasPages())
    <div class="hidden md:block mx-auto text-slate-500">
        <p>
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                {{ $paginator->firstItem() }}
                {!! __('to') !!}
                {{ $paginator->lastItem() }}
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!}
            {{ $paginator->total() }}
            {!! __('results') !!}
        </p>
    </div>
@else
    <div class="hidden md:block mx-auto text-slate-500">
        <p>

        </p>
    </div>
@endif
