@props(['route' => '#'])

<li>
    <a {{ $attributes->merge(['href' => $route, 'class' => '']) }}>
        {{ $slot }}
    </a>
</li>
