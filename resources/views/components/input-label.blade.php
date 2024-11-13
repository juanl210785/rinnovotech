@props(['value'])

<label {{ $attributes->merge(['for' => 'regular-form-1', 'class' => 'form-label']) }}>
    {{ $value ?? $slot }}
</label>
