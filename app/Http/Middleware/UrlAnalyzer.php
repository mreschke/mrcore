<?php namespace Mrcore\Http\Middleware;

use Closure;

class UrlAnalyzer {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
		\App::instance('postId', 42);
		#return response('Unauthorized.', 401);

		return $next($request);

	}

}
