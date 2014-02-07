<?php namespace Mrynk\L4Hashids;

use Illuminate\Support\ServiceProvider;

class L4HashidsServiceProvider extends ServiceProvider {

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
		$this->package('mrynk/l4-hashids');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['hashids'] = $this->app->share(function( $app )
		{
			//var_dump( $app['config']->get('l4-hashids::') );
			//die();
			return new L4Hashids( $app['config']
				/*$app['config']->get('l4-hashids::salt', $app['config']->get('app.key') ),
				$app['config']->get('l4-hashids::min_length', 6 ),
				$app['config']->get('l4-hashids::alphabet', false )*/
			);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('hashids');
	}

}