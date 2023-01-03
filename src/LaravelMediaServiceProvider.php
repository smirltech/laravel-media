<?php

namespace SmirlTech\LaravelMedia;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SmirlTech\LaravelMedia\Commands\LaravelMediaCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-media_table')
            ->hasCommand(LaravelMediaCommand::class);
    }
}
