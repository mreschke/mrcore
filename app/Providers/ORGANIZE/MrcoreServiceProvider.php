<?php namespace Mrcore\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use Config;
use Auth;
use User;
use Mrcore;


/**
 * Provides mRcore5 Bootstrap
 * This is mrcore specific bootstrap, the first custom service booted by Laravel
 * This is what I consider to be the entry point into mrcore
 *
 * I use a service provider instead of bootstrap/start.php or app/start/*
 * because it sits exactly where I need it in laravels bootstrap. bootstrap/start.php
 * it too early because $app->run() hasn't happened yet so no eloquent but
 * app/start is too late because all other services have been loaded
 */
class MrcoreServiceProvider extends ServiceProvider
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
		// Bind mrcore (our API and main container) to IoC container
		/*$this->app->bindShared('mrcore', function() {
			return new \Mrcore\Mrcore\Mrcore(
				new \Mrcore\Mrcore\Post(),
				new \Mrcore\Mrcore\Router(),
				new \Mrcore\Mrcore\User(),
				new \Mrcore\Mrcore\Layout(),
				new \Mrcore\Mrcore\Config()
			);
		});*/
		$this->app->bind('mrcore', 'Mrcore\Mrcore\Mrcore');

		// Tell the IoC How to bind the interfaces for dependency injection
		$this->app->bind('Mrcore\Mrcore\MrcoreInterface', 'Mrcore\Mrcore\Mrcore');
		$this->app->bind('Mrcore\Mrcore\ConfigInterface', 'Mrcore\Mrcore\Config');
		$this->app->bind('Mrcore\Mrcore\LayoutInterface', 'Mrcore\Mrcore\Layout');
		$this->app->bind('Mrcore\Mrcore\PostInterface', 'Mrcore\Mrcore\Post');
		$this->app->bind('Mrcore\Mrcore\RouterInterface', 'Mrcore\Mrcore\Router');
		$this->app->bind('Mrcore\Mrcore\UserInterface', 'Mrcore\Mrcore\User');


		// Testing Event, var_dump all queries
		#\DB::listen(function($sql) { var_dump($sql); });

		// PHP settings
		// Set var_dump to display more data	
		#ini_set('xdebug.var_display_max_depth', -1);
		#ini_set('xdebug.var_display_max_children', -1);
		#ini_set('xdebug.var_display_max_data', -1);

	}	


	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// mReschke Custom auth driver (standard eloquent + cache)
		#Auth::extend('eloquentCached', function ($app) {
		#	$model = $app['config']['auth.model'];
		#	return new \Mrcore\Auth\CachedEloquentUserProvider($app['hash'], $model);
		#});

		exit('boot');

		// Detect if using webdav url
		$isWebdav = preg_match("|".Config::get('mrcore.webdav_base_url')."|i", Request::url());

		// Detect if accessing /file and passing basic/digest auth username (so using curl or wget...)
		#$fileHttpAuth = (Request::is('file*') && Request::server('PHP_AUTH_USER'));


		#try {
			#dump(Auth::check());
			// Login as anonymous if no one is logged in yet (first time to site)
			#if ($isWebdav || (Request::is('file*') && Request::server('PHP_AUTH_USER'))) {
			#} else {
				#if (!Auth::check()) {
				#if (!User::isAuthenticated()) {
					#echo "1";
					#dd('xxxxxxxx');
					#$user = User::find(Config::get('mrcore.anonymous'));
					#Auth::login($user);
					#Auth::user()->login();
				#}
			#}
			#dump(User::isAuthenticated());


			// Set some Mrcore API data
			Mrcore::user()->setModel(Auth::user());

			// Refactor, get out into Mrcore\Bootstrap somewhere?
			// ??maybe not maybe it should just be a real config somewhere not mrcore
			// maybe new internal config file (internal.reserved_routes); or (router.reserved)
			// also (file.magic and file.magic_exceptions)
			#$this->app['test'] = "asdf";

			// Add my own internal configs
			Config::set('mrcore.reserved_routes', array(
				'admin', 'router', 'file', 'files',
				'search', 'login', 'logout', 'demo',
				'assets', 'images', 'js', 'css', 'theme',
				'ace-editor',
				'tmp'
			));
			Config::set('mrcore.legacy_routes', array(
				'topic', 'topics',
				'post', 'posts',
			));
			Config::set('mrcore.magic_folders', array('.sys', 'app'));
			Config::set('mrcore.magic_folders_exceptions', array('.sys/public', 'app/public'));
		
			// Register the custom workbenches and configs
			require base_path().'/workbench/config.php';
			require base_path().'/workbench/register.php';

		#} catch (\Illuminate\Database\QueryException $e) {
			//
		#}
	}


	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('mrcore');
	}

}
