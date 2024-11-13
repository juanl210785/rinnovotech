@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['id' => 'regular-form-1', 'class' => 'form-control']) !!}>
