<?php
\Lifecycle::add(__FILE__);

/*
|--------------------------------------------------------------------------
| Workbench Service Provider Config Registration
|--------------------------------------------------------------------------
|
| Register your custom configs here or define them in the app/config dir
| Each individual workbench may have its own config section but
| this is where you register your global configs, these are always
| available across all workbenches.
|
*/

// Database Connections
// Do not use the reserved sqlite, mysql, pgsql, sqlsrv in connections.xxxx
/*Config::set('database.connections.mrcore4', array(
	'driver'    => 'mysql',
	'host'      => 'localhost',
	'database'  => 'mrcore4',
	'username'  => 'root',
	'password'  => 'password',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
	// Set max query to 128mb
	'options'   => array(PDO::MYSQL_ATTR_MAX_BUFFER_SIZE => 128 * 1024 * 1024),
));*/

/*Config::set('database.connections.dyna-sql1.Ebis_Prod', array(
	'driver'   => 'sqlsrv',
	'host'     => 'dyna-sql',
	'database' => 'Ebis_Prod',
	'username' => 'dyna',
	'password' => 'dyna',
	'prefix'   => '',
));*/


// Dynatron Global Configs
/*Config::set('dynatron', array(
	
	// Constant across all environments
	'app_id' => 57,

	// Variable across environments
	#'log_path' => Dynatron::config('log_path', null, 
	#	'/store/data/Production/log'
	#),
));*/



// Custom Configs
// Do not use the reserved config names already in laravel, see laravels app/config dir
// Reserved are: app, auth, cache, compile, database, mail, mrcore, queue, remote, session, view, workbench
/*Config::set('my', array(

	// Dynatron Global Configs
	'log_path' => '/store/data/Production/log',

));*/


// Database Configs for Mreschke\Dbal
/*Config::set('my.db', array(

	// Default Database Type
	'default_type' => 'mssql',

	// Mysql Connections
	'mysql' => '{"server":"localhost","port":"3306","database":"test","username":"root","password":"xyz","type":"mysql"}',
	'db_mrcore4' => '{"server":"lindb1","port":"3306","database":"mrcore4","username":"root","password":"xyz","type":"mysql"}',

	// MSSQL Connections
	'mssql' => '{"server":"dyna-sql1","database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}', #default connection
	'sso' => '{"server":"dyna-sql6","database":"sso","username":"dyna","password":"dyna","type":"mssql"}',
	'vfi' => '{"server":"dyna-sql6","database":"vfi","username":"dyna","password":"dyna","type":"mssql"}',
	
	'dyna-sql'  => '{"server":"dyna-sql", "database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',
	'dyna-sql1' => '{"server":"dyna-sql", "database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',
	'dyna-sql2' => '{"server":"dyna-sql2","database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',
	'dyna-sql3' => '{"server":"dyna-sql3","database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',
	'dyna-sql4' => '{"server":"dyna-sql4","database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',
	'dyna-sql5' => '{"server":"dyna-sql5","database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',
	'dyna-sql6' => '{"server":"dyna-sql6","database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',
	'dyna-sql7' => '{"server":"dyna-sql7","database":"ebis_prod","username":"dyna","password":"dyna","type":"mssql"}',

));*/


// Configs for the mreschke-mrcore4-legacy package
/*Config::set('my.legacy', array(

	'MSSQL_DB_NAME' => 'Ebis_Prod',
	'MSSQL_DB_SERVER' => 'dyna-sql6',
	'MSSQL_DB_PORT' => 1433,
	'MSSQL_DB_USER' => 'dyna',
	'MSSQL_DB_PASS' => 'dyna',

	'MYSQL_DB_NAME' => 'mrcore4',
	'MYSQL_DB_SERVER' => 'localhost',
	'MYSQL_DB_PORT' => 3306,
	'MYSQL_DB_USER' => 'root',
	'MYSQL_DB_PASS' => 'a;sldkfjqwer',

));*/
