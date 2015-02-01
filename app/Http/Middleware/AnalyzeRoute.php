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

		$reserved = [
			'admin', 'router', 'file', 'files',
			'search', 'login', 'logout', 'demo',
			'assets', 'images', 'js', 'css', 'theme',
			'ace-editor',
			'tmp'
		];
		$legacy = ['topic', 'topics', 'post', 'posts'];

		// Analyse URL and find matching mrcore router tabel entry
		$route = app('Mrcore\Support\RouteAnalyzer');
		$route->analyzeUrl($reserved, $legacy);

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

			// Override posts view mode with URL ?default, ?simple or ?raw
			$defaultMode = Input::get('default');
			if (isset($defaultMode) || Input::get('viewmode') == 'default') {
				Layout::mode('default');
			}
			$simpleMode = Input::get('simple');
			if (isset($simpleMode) || Input::get('viewmode') == 'simple') {
				Layout::mode('simple');
			}
			$rawMode = Input::get('raw');
			if (isset($rawMode) || Input::get('viewmode') == 'raw') {
				Layout::mode('raw');
			}

			// Adjust $view for this $this->post
			Layout::title($post->title);
			if ($post->mode_id <> Config::get('mrcore.default_mode')) {
				Layout::mode($post->mode->constant);	
			}

			// ####################################################

			// Store post and router in the IoC for future usage
			Mrcore::post()->setModel($post);

	
		} elseif ($route->foundRedirect()) {
			return Redirect::to($route->responseRedirect);

		} elseif ($route->notFound()) {
			abort(404);
			#Response::notFound(); ??
		}
		// there is a 202 also ?? webdav

		// Next middleware
		return $next($request);

	}

}
