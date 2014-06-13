<?php namespace Kitbs\Clockwork;

use Illuminate\Support\ServiceProvider;

class ClockworkServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('kitbs/clockwork-sms');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		$this->app['clockwork-sms'] = $this->app->share(function($app)
		{
			return new \Kitbs\Clockwork\ClockworkLaravel;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
