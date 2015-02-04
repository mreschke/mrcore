<?php

// DO NOT use env() in this view.php as it is used by the mRcore asset manager

return [

	/*
	|--------------------------------------------------------------------------
	| Mrcore Themes
	|--------------------------------------------------------------------------
	|
	| Enabled mrcore themes.  You may specify as many enabled themes as you need.
	| They are all merged and override each other.  Order is critical.  The first
	| asset or view found in this array is used first.  Because of this order
	| the small sub-theme should be defined first, then the larger base theme.
	| Name must be vendor/package format.
	| Paths are relative to your mrcore root (no beginning or trailing /)
	|
	*/

	'themes' => [
		[
			'namespace' => 'Mrcore\Themes\Bootswatch',
			'path' => '../Themes/Bootswatch'
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Theme Main CSS
	|--------------------------------------------------------------------------
	|
	| Main Css
	| default amelia darkly lumen spacelab cerulean readable superhero
	| cosmo flatly simplex united cyborg journal slate yeti
	|
	*/	

	'css' => 'darkly.min.css'

];

// Mrcore\Themes\Bootswatch
// Themes\Bootswatch