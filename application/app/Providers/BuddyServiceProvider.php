<?php

namespace App\Providers;

use App\Core\BuddyProvider;
use App\Core\ConfigurationManager;
use App\Core\Contracts\Buddy;
use App\Core\Contracts\BuddyConfiguration;
use Illuminate\Support\ServiceProvider;

class BuddyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Buddy::class, function ($app) {
            return new BuddyProvider();
        });

        $this->app->singleton(BuddyConfiguration::class, function ($app) {
            return new ConfigurationManager();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       //
    }
}
