<?php

namespace SmirlTech\LaravelMedia;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMediaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-media')
            //->hasConfigFile()
            ->hasViews()
            ->hasMigration('2023_01_03_100000_create_media_table')
            ->runsMigrations()
            ->hasRoutes('web');
    }
}
