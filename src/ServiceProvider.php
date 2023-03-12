<?php

namespace Padosoft\LaravelDressCodeApi;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations'),'migrations'
        ]);
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('dresscode-api-settings.php'),'config'
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
        $this->app->singleton(DressCodeClientService::class, function () {
            return new DressCodeClientService();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [DressCodeClientService::class];
    }
}
