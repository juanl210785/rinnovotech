@if (count($breadcrumbs))
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item {{ !isset($breadcrumb['route']) ? 'active' : '' }}">
                    @isset($breadcrumb['route'])
                        <a href="{{$breadcrumb['route']}}">{{$breadcrumb['name']}}</a>
                        @else
                        {{$breadcrumb['name']}}
                    @endisset</li>
            @endforeach

            {{-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
        </ol>
    </nav>
@endif
