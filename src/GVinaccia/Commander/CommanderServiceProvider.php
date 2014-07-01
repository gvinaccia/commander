<?php

namespace GVinaccia\Commander;

use Illuminate\Support\ServiceProvider;

class CommanderServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->registerCommandResolver();

        $this->registerCommandBus();
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

    private function registerCommandResolver()
    {
        $this->app->bind('GVinaccia\\Commander\\CommandResolver', 'GVinaccia\\Commander\\BasicCommandResolver');
    }

    private function registerCommandBus()
    {
        $this->app->bindShared('GVinaccia\\Commander\\CommandBus', function () {
            return $this->app->make('GVinaccia\\Commander\\ValidationCommandBus');
        });
    }

}
