<?php
\Lifecycle::add(__FILE__);

$config = function($dev, $prod) {
	if (\App::environment('production')) return $prod; return $dev;
};

return [

	/*
	|--------------------------------------------------------------------------
	| Constant across all environments
	|--------------------------------------------------------------------------
	|
	*/

	'app_id' => 57,


	/*
	|--------------------------------------------------------------------------
	| Variable across environments
	|--------------------------------------------------------------------------
	|
	| Use the built in Dynatron::config and set defaults to production values.
	| Use redis to override the value in your local environment
	|
	*/	

	'log_path' => $config('/tron/xendev/log',
		'/store/data/Production/log'
	),

	'keystone_path' => $config('/tron/xendev/data/Keystone',
		'/store/data/Production/data/Keystone'
	),

];

