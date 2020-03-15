<?php
// Configuration variables for db access
define('DEVELOPMENT_ENVIRONMENT',true);
#--------------------------------------------------------------------------------------------------
$localhost = gethostbyaddr($_SERVER['REMOTE_ADDR']);//echo '<hr>' . $localhost . '<hr>';

if($localhost == 'server.daa'):
	define('DB_NAME', 'apps_attendance');
	define('DB_USER', 'user02');
	define('DB_PASS', 'user02');
	define('DB_HOST', 'localhost');
else:
	define('DB_NAME', 'apps_attendance');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_HOST', 'localhost');
endif;
//*/
#--------------------------------------------------------------------------------------------------