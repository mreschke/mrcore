<?php

// Not really sure where put these, for now they are here and included from Providers\AppServiceProvider.

use Mrcore\Models\User;

// Response Macros
Response::macro('notFound', function()
{
	return Response::view('error.404', array(), 404);
});

Response::macro('denied', function()
{
	if (User::isAuthenticated()) {
		// If logged in then show 401 error page
		return Response::view('error.401', array(), 401);
	} else {
		$url = Request::url();
		if (Request::server('QUERY_STRING')) $url .= "?".Request::server('QUERY_STRING');
		return View::make('login', array('referer' => $url));
	}
});

Response::macro('error', function()
{
	return Response::view('error.500', array(), 500);
});