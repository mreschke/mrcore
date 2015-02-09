<?php
\Lifecycle::add(__FILE__);

/*
|--------------------------------------------------------------------------
| Custom Alias (Facade) Registrations
|--------------------------------------------------------------------------
|
| Register your custom aliases/facades here
| Or use your own custom service provider
|
*/

#$loader = \Illuminate\Foundation\AliasLoader::getInstance();
#$loader->alias('Mysql', 'Mreschke\Dbal\Facades\Mysql');
#$loader->alias('Mssql', 'Mreschke\Dbal\Facades\Mssql');
#$loader->alias('Render', 'Mreschke\Render\Facades\Render');



/*
|--------------------------------------------------------------------------
| Custom Service Provider Registrations
|--------------------------------------------------------------------------
|
| Register your custom service provders here
| Service Providers are the primary way to extend your mrcore installation
|
*/

// Register the main Dynatron Service Provider
App::register('Dynatron\Framework\FrameworkServiceProvider');



/*
|--------------------------------------------------------------------------
| Custom Theme and Sub Theme Registrations
|--------------------------------------------------------------------------
|
| Register your themes and sub themes here
| You must always define one base theme and one subtheme
| The main larger "base" theme should be defined LAST, not first
| The symlink in workbench/theme/current-theme should point to that
| "base" theme and the symlink in workbench/theme/sub-theme should point
| to the smaller override theme
|
*/

App::register('Theme\Dynatron\DynatronServiceProvider');
App::register('Mrcore\BootswatchTheme\BootswatchThemeServiceProvider');



/*
|--------------------------------------------------------------------------
| Custom Attributes
|--------------------------------------------------------------------------
|
| Register any other small custom items here
| For more customization, use your own service providers
|
*/

// Bootswatch Theme Override
// default cerulean cosmo cyborg darkly flatly journal lumen paper
// readable sandstone simplex slate spacelab superhero united yeti
$theme = 'paper';
Layout::replaceCss("css/bootstrap/", "sub-theme/css/bootstrap/$theme.min.css");
Layout::css("sub-theme/css/bootstrap/override/$theme-dynatron.css");
