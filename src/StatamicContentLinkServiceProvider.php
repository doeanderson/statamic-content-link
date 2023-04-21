<?php

namespace DoeAnderson\StatamicContentLink;

use DoeAnderson\StatamicContentLink\Commands\StatamicContentLinkCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StatamicContentLinkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('statamic-content-link')
            ->hasConfigFile('statamic/content-link')
            ->hasCommand(StatamicContentLinkCommand::class);
    }
}
