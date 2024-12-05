@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['rows' => '10', 'cols' => '30', 'class' => 'form-control']) !!}></textarea>
