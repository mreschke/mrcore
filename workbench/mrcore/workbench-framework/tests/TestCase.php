<?php

function createApplication()
{
	$unitTesting = true;

	$testEnvironment = 'testing';

	// Start laravel
	$app = require __DIR__ . '/../../../../bootstrap/start.php';

	// Parse the vendor/package from the current directory	
	$tmp = explode('/', __DIR__);
	$vendor = studly_case($tmp[count($tmp)-3]);
	$package = studly_case($tmp[count($tmp)-2]);
	$namespace = "$vendor\\$package";
	$workbenchBase = base_path()."/workbench/$workbench";
	$workbenchService = "$namespace\\${package}ServiceProvider";

	// Fireup the workbench
	$app->register("$workbenchService");
	if (file_exists("$workbenchBase/src/views/")) {
		\View::addNamespace("$package", "$workbenchBase/src/views/");
	}
	return $app;
}
