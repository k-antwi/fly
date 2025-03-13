<?php

namespace KAntwi\Fly;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use KAntwi\Fly\Console\AddCommand;
use KAntwi\Fly\Console\InstallCommand;
use KAntwi\Fly\Console\PublishCommand;

class FlyServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();
        $this->configurePublishing();
    }

    /**
     * Register the console commands for the package.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                AddCommand::class,
                PublishCommand::class,
            ]);
        }
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../runtimes' => $this->app->basePath('docker'),
            ], ['fly', 'fly-docker']);

            $this->publishes([
                __DIR__ . '/../bin/fly' => $this->app->basePath('fly'),
            ], ['fly', 'fly-bin']);

            $this->publishes([
                __DIR__ . '/../bin/to-vps' => $this->app->basePath('fly'),
            ], ['fly', 'fly-to-vps']);

            $this->publishes([
                __DIR__ . '/../database' => $this->app->basePath('docker'),
            ], ['fly', 'fly-database']);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            InstallCommand::class,
            PublishCommand::class,
        ];
    }
}
