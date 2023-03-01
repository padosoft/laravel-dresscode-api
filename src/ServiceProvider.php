<?php

namespace Padosoft\LaravelDressCodeApi;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__ . '/Migrations' => database_path('migrations')
        ]);
        $this->publishes([
            __DIR__ . '/Config/config.php' => config_path('dresscode-api-settings.php')
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(DressCodeClient::class, function () {
            return new DressCodeClient();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [DressCodeClient::class];
    }
}
