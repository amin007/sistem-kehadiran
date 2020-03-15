<?php
#--------------------------------------------------------------------------------------------------
$basepath = '';
if ($basepath === '')
{
    // Check the http host
    if (isset($_SERVER['HTTP_HOST'])){
		// Combine them as one url
		$basepath = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'https';
		$basepath .= '://'. $_SERVER['HTTP_HOST'];
		$basepath .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    } else {
		// By default set to localhost
		$basepath = URL;
    }
}
#--------------------------------------------------------------------------------------------------
// Used to define the default path
$controller = 'home';
$action = 'index';
$query = null;
$fvalue = null;

if (isset($_GET['load']))
{
    $params = array();
    $params = explode("/", $_GET['load']);

    $controller = ucwords($params[0]);

    if (isset($params[1]) && !empty($params[1])) {
        $action = $params[1];
    }

    if (isset($params[2]) && !empty($params[2])) {
        $query = $params[2];
    }

    for ($i=3; $i<sizeof($params); $i++) {
        $fvalue = $fvalue.'value=>'.$params[$i];
    }
}
#--------------------------------------------------------------------------------------------------
	$modelName = $controller;
	$controller .= 'Controller';
	$load = new $controller($modelName, $action);
#--------------------------------------------------------------------------------------------------
/*// Used to check whether site is under maintenane
if(SITE_STATUS == 1) {
	$modelName = 'home';
	$controller .= 'Controller';
	$load = new $controller($modelName, 'locked');
} else {
	$modelName = $controller;
	$controller .= 'Controller';
	$load = new $controller($modelName, $action);
}*/
#--------------------------------------------------------------------------------------------------
// Used to debug the MVC circulation proccessed
//echo '<hr>2.Controller='.$controller.'|Model='.$modelName.'|Action='.$action.'|Value='.$query.$fvalue;
#--------------------------------------------------------------------------------------------------
// Used to register current model name and action
$_SESSION['modName'] = $modelName;
$_SESSION['actName'] = $action;

// Used to load current model name and action
if (method_exists($load, $action)) {
    $load->$action($query,$fvalue);
} else {
    die('Invalid method. Please check the URL.');
}
//*/
#--------------------------------------------------------------------------------------------------