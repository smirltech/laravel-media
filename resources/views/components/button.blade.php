<button {!! $attributes->merge(['class' => 'btn']) !!}>
    {{$slot}}
    <x-laravel-media::loading target="submit"/>
</button>




