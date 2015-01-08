<?php
\Lifecycle::add(__FILE__);

return array(

	// fixme, this neds removed, moved to dynatron
	'log_path' => '/store/data/Production/log',



	/*
	|--------------------------------------------------------------------------
	| Dynatron DB configs for Mreschke\Dbal
	|--------------------------------------------------------------------------
	|
	*/

	'db' => array(

		// Default Database Type
		'default_type' => 'mssql',

		// Mysql Connections
		'mysql' => '{"server":"localhost","port":"3306","database":"test","username":"root","password":"xyz","type":"mysql"}',
		'db_mrcore4' => '{"server":"lindb1","port":"3306","database":"mrcore4","username":"root","password":"xyz","type":"mysql"}',
		'warehouse' => '{"server":"localhost","port":"3306","database":"warehouse","username":"root","password":"techie","type":"mysql"}',

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

	),



	/*
	|--------------------------------------------------------------------------
	| Configs for the mreschke-mrcore4-legacy package
	|--------------------------------------------------------------------------
	|
	*/

	'legacy' => array(

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

	),
	
);