<?php namespace Mrcore\Http\Middleware;

use Auth;
use Input;
use Config;
use Layout;
use Mrcore;
use Closure;
use Redirect;
use Response;
use Mrcore\Models\Post;
use Mrcore\Models\User;

class AnalyzeRoute {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		#$isWebdav = preg_match("|".Config::get('mrcore.webdav_base_url')."|i", Request::url());
		#if ($isWebdav) {
		#	$this->responseCode = 202;
		#	return;
		#}
		// FIX, if webdav, don't bother with router, I pulled this out of router.php
		if (!Auth::check()) {
			$user = User::find(Config::get('mrcore.anonymous'));
			Auth::login($user);
			Auth::user()->login();
		}

		// Set some Mrcore API data
		Mrcore::user()->setModel(Auth::user());		

		// Analyse URL and find matching mrcore router tabel entry
		$route = app('Mrcore\Support\RouteAnalyzer');
		$route->analyzeUrl(Config::get('mrcore.reserved_routes'), Config::get('mrcore.legacy_routes'));

		if ($route->foundRoute()) {

			// Get post defined by route
			$post = Post::get($route->currentRoute()->post_id);

			// Check deleted
			$userIsAdmin = false; //FIXME User::isAdmin() ??
			if ($post->deleted && !$userIsAdmin) {
				$route->responseCode = 401;
				abort(401); #Response::denied(); ??
			}

			// Check post permissions including UUID
			if (!$post->uuidPermission()) {
				$route->responseCode = 401;
				abort(401); #Response::denied(); ??
			}

			// Update clicks for post and router table
			if ($route->responseCode == 200) {
				$route->currentRoute()->incrementClicks($route);
				$post->incrementClicks();
			}

			// Adjust $view for this $this->post
			Layout::title($post->title);
			if ($post->mode_id <> Config::get('mrcore.default_mode')) {
				Layout::mode($post->mode->constant);	
			}

			// Store post and router in the IoC for future usage
			Mrcore::post()->setModel($post);

	
		} elseif ($route->foundRedirect()) {
			#if (\Request::segment(1) == 'post' && \Request::segment(3) == 'edit') {
				// FIXME later, don't redirect if post/1/edit, or edit won't hit
			#} else {
			#	return Redirect::to($route->responseRedirect);	
			#}

		} elseif ($route->notFound()) {
			#abort(404);
			#Response::notFound(); ??
		}
		// Will also return 202 which means URL is reserved
		// and will be handled by laravel routes file, like /search, /login...

		// Set some Mrcore API data
		Mrcore::router()->setModel($route->currentRoute());
		Mrcore::router()->responseCode($route->responseCode);
		Mrcore::router()->responseRedirect($route->responseRedirect);

		// Next middleware
		return $next($request);

	}

}
