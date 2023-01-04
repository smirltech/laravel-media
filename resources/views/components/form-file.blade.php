@props(['disabled' => false,'isValid','label','error'])
@php
    if (isset($isValid )) {
        $classes = ($isValid ===true)
                    ? ' is-valid'
                    : ' is-invalid';
    } else {
        $classes = '';
    }
@endphp
@include('laravel-media::components.form-label')
<input
    accept="application/pdf, image/*"
    type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control'.$classes]) !!}>
@include('laravel-media::components.form-upload-feedback')
@if(isset($error))
    <x-laravel-media::form-invalid-feedback>
        {{$error}}
    </x-laravel-media::form-invalid-feedback>
@endif


