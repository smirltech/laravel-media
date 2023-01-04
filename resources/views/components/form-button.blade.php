@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'btn btn-primary']) !!}>
    {{ $slot }}
    <x-laravel-media::loading target="submit"/>
</button>
