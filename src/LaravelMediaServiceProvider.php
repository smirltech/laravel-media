<?php

namespace SmirlTech\LaravelMedia;

use Illuminate\Support\ServiceProvider;

class LaravelMediaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
