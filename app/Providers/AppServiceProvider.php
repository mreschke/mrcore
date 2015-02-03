<?php namespace Mrcore\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
use App;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{

		// Load our custom macros
		require __DIR__.'/../Support/Macro.php';

		// ??????????????????????? App::error not exist, this was in global/start
		// Mrcore FormValidationException
		#\App::error(function(Mrcore\Exceptions\FormValidationException $exception, $code)
		#{
		#	return Redirect::back()->withInput()->withErrors($exceptions->getErrors());
		#});


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


	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Illuminate\Contracts\Auth\Registrar', 'Mrcore\Services\Registrar');

		// Mrcore Bindings
		$this->app->bind('mrcore', 'Mrcore\Mrcore\Mrcore');
		$this->app->bind('Mrcore\Mrcore\MrcoreInterface', 'Mrcore\Mrcore\Mrcore');
		$this->app->bind('Mrcore\Mrcore\ConfigInterface', 'Mrcore\Mrcore\Config');
		$this->app->bind('Mrcore\Mrcore\LayoutInterface', 'Mrcore\Mrcore\Layout');
		$this->app->bind('Mrcore\Mrcore\PostInterface', 'Mrcore\Mrcore\Post');
		$this->app->bind('Mrcore\Mrcore\RouterInterface', 'Mrcore\Mrcore\Router');
		$this->app->bind('Mrcore\Mrcore\UserInterface', 'Mrcore\Mrcore\User');		

		// Layout Bindings
		$this->app->bind('layout', 'Mrcore\Support\Layout');
		$this->app->bind('Mrcore\Support\LayoutInterface', 'Mrcore\Support\Layout');

		// Register Themes Here instead of config/app.php because of Support/AssetProvider
		$themes = Config::get('theme.themes');
		foreach ($themes as $theme) {
			#dd(realpath("/var/www/mrcore6/Applications/Mrcore/Theme/Bootswatch"))
			$this->app->register("$theme\Providers\AppServiceProvider");
		}

		// DEBUG ONLY, set PHP error reporting level
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		#error_reporting(E_ERROR | E_WARNING | E_PARSE | E_DEPRECATED);

	}

}
