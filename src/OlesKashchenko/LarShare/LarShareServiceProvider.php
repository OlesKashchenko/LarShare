<?php

namespace OlesKashchenko\LarShare;

use Illuminate\Support\ServiceProvider;


class LarShareServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->package('oles-kashchenko/lar-share');
	} // end boot

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		\Route::get('_lar-share/close/window', function() {
			return '<html><body><script>window.close()</script></body></html>';
		});

		$this->app['lar_share'] = $this->app->share(function($app) {
			return new LarShare();
		});
	} // end register

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	} // end provides
}