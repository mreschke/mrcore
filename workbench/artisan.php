<?php
\Lifecycle::add(__FILE__);

/*
|--------------------------------------------------------------------------
| Artisan Command Registration
|--------------------------------------------------------------------------
|
| Register your custom artisan commands here
| Artisan commands are the primary way to extend mrcore command line!
|
*/

#Artisan::add(new Mreschke\Mrcore4Legacy\Mrcore4Upgrade);

# Register App\Warehouse\EtlCommand
App::register('App\Warehouse\WarehouseServiceProvider');
Artisan::resolve('App\Warehouse\EtlCommand');
