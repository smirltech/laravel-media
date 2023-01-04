<form wire:submit.prevent="save">
    <x-laravel-media::form-file wire:model="media" multiple/>

    <x-laravel-media::list-files :media="$media" delete/>

    <x-laravel-media::form-button type="submit" class="btn-primary">
        {{__('Save')}}
    </x-laravel-media::form-button>

</form>
