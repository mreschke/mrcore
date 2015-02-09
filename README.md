# Mrcore6

A Wiki/CMS built with Laravel 5

See http://mrcore.mreschke.com for details and documentation.


# Install

?





I WANT - first one overrides
----------------------------

routes
	apps
	laravel
	auth
	wiki (must be last or after auth, has catch all)
	foundation (has a / for test, overwritten by wiki or auth above)

views
	laravel
	apps
	subtheme
	auth
	wiki
	basetheme

assets
	apps
	laravel (maybe first like view)
	custom theme
	auth
	wiki
	basetheme
	


-----------------
AppServiceProvider register
RouteServiceProvider register

FoundationServiceProvider register
	SUBTHEME views, assets

AuthServiceProvider register
	n/a

WikiServiceProvider register
	n/a

-----------------
AppServiceProvider boot
RouteServiceProvider boot
	main laravel routes

FoundationServiceProvider boot
	base theme views

AuthServiceProvider boot
	routes, views, assets

WikiServiceProvider boot
	!APPS!
	routes, views, assets






modules = [
	[
		'name' => 'Foundation',
		'namespace' => 'Mrcore\Modules\Foundation',
		'path' => '../Modules/Foundation'
	],
	[
		'name' => 'Auth',
		'namespace' => 'Mrcore\Modules\Auth',
		'path' => '../Modules/Auth'
	],
	[
		'name' => 'Wiki',
		'namespace' => 'Mrcore\Modules\Wiki',
		'path' => '../Modules/Wiki'
	],	



]










# License

This project is open-sourced software licensed under the [MIT license](http://mreschke.com/license/mit)




# Current Laravel 5.0 Porting Issues

Move mrcore services into providers folder, merge nicely...

Look at config/compiled, add my services?

Revisit Middleware\AuthenticateWithDigestAuth.php when ready, port old auth.digest filter

Put back old blade {{ }} even though security issue, fix later

fix all css stuff, I want less and gulp now, but kept old stuff

public symlinks to workbenches?

perhaps $posts->appends($get)->render() instead of $posts->appends($get)->links() in theme/src/view/search/layout.blade.php

All workbench providers must now use Mrcore\Providers\ServiceProvider;