<?php namespace Mrcore\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// ??????????????????????? App::error not exist, this was in global/start
		// Mrcore FormValidationException
		#\App::error(function(Mrcore\Exceptions\FormValidationException $exception, $code)
		#{
		#	return Redirect::back()->withInput()->withErrors($exceptions->getErrors());
		#});


		#?????????? MARCOS???????????

		/*
		|--------------------------------------------------------------------------
		| Response Macros
		|--------------------------------------------------------------------------
		|
		| These are my own custom resposnes
		| mReschke
		|
		*/
		\Response::macro('notFound', function()
		{
			return \Response::view('error.404', array(), 404);
		});

		\Response::macro('denied', function()
		{
			if (\User::isAuthenticated()) {
				// If logged in then show 401 error page
				return \Response::view('error.401', array(), 401);
			} else {
				$url = \Request::url();
				if (\Request::server('QUERY_STRING')) $url .= "?".\Request::server('QUERY_STRING');
				return \View::make('login', array('referer' => $url));
			}
		});

		\Response::macro('error', function()
		{
			return \Response::view('error.500', array(), 500);
		});		
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
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'Mrcore\Services\Registrar'
		);

		#\Blade::setRawTags('{{', '}}');
		#\Blade::setContentTags('{{{', '}}}');
		#\Blade::setEscapedContentTags('{{{', '}}}');		
	}

}
