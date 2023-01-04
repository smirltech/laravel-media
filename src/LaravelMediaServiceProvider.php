<?php

namespace SmirlTech\LaravelMedia;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use SmirlTech\LaravelMedia\Livewire\MediaAttachment;

class LaravelMediaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-media');

        Livewire::component('media-attachment', MediaAttachment::class);
    }
}
