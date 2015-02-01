<?php namespace Mrcore\Themes\Bootswatch;

use Illuminate\Support\ServiceProvider;
use Layout;
use View;
use Config;

class ThemeProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Register new view location
		View::addLocation(realpath(__DIR__.'/views'));

		// Get main css
		$css = Config::get('theme.css');

		Layout::css('asset/css/bootstrap/'.$css);
		Layout::css('asset/css/dataTables.bootstrap.css');
		Layout::css('asset/css/yamm.css');
		Layout::css('asset/css/wiki.css'); #should be last

		// Bootstrap Container
		Layout::container(true);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	}

}
