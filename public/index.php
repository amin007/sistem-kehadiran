<?php
session_start();

// Used to define high level initiation
define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(dirname(__FILE__)));
define ('URL', dirname('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']));
define ('SITE_ID', 1);

# 1. laporan tahap kesilapan kod PHP
error_reporting(E_ALL);

# 2. isytiharkan zon masa => Asia/Kuala Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');
#--------------------------------------------------------------------------------------------------
// Used to autoload required loader
/*function __autoload($class)
{
	if (file_exists(ROOT . DS . 'system' . DS . 'helpers' . DS . strtolower($class) . '.php')) {
		require_once (ROOT . DS . 'system' . DS . 'helpers' . DS . strtolower($class) . '.php');
	}
	else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($class) . '.php')) {
		require_once (ROOT . DS . 'application' . DS . 'models' . DS . strtolower($class) . '.php');
	}
	else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($class) . '.php')) {
		require_once (ROOT . DS . 'application' . DS . 'controllers'  . DS . strtolower($class) . '.php');
	}
}//*/
#--------------------------------------------------------------------------------------------------
spl_autoload_register(function ($class)
{
	$nameClass = strtolower($class) . '.php';
	$file01 = ROOT . DS . 'system' . DS . 'helpers' . DS . $nameClass;
	$file02 = ROOT . DS . 'application' . DS . 'models' . DS . $nameClass;
	$file03 = ROOT . DS . 'application' . DS . 'controllers' . DS . $nameClass;
	if (file_exists($file01))
	{
		//echo '$class in folder utilities->' . $class . '<br>';
		require_once $file01;
	}
	elseif(file_exists($file02))
	{
		//echo '$class in folder models->' . $class . '<br>';
		require_once $file02;
	}
	elseif(file_exists($file03))
	{
		//echo '$class in folder controllers->' . $class . '<br>';
		require_once $file03;
	}//*/

});
//*/
#--------------------------------------------------------------------------------------------------
$core[] = 'function.php';
$core[] = 'init.php';
$core[] = 'bootstrap.php';
//echo '<hr>Core <hr>' . "\n";
foreach($core as $file):
	//echo '<hr>' . ROOT . DS . 'system' . DS . 'core' . DS . $file;
	require_once (ROOT . DS . 'system' . DS . 'core' . DS . $file);
endforeach;
//echo '<hr>Cubaan debug <hr>' . "\n";
//diManaJoeJambul('show_msg');
#--------------------------------------------------------------------------------------------------
###################################################################################################