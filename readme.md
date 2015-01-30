# Mrcore6

A Wiki/CMS built with Laravel 5

See http://mrcore.mreschke.com for details and documentation.


# Install

?



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