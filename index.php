<?php

require 'router/Router.php';
$router = new SPM\HTTP\Router();

/**
 * Gets the latest stable protocl
 */
$router->get('/get/(\w+)', function($name){
	echo "get " . $name;
});

/**
 * Gets the protocol in a certain version
 */
$router->get('/get/(\w+)/([0-9.]+)', function($name, $version){
	echo "get " . $name . " - v " . $version;
});

/**
 * Gets the protocol in a certain git version
 */
$router->get('/get/(\w+)/git/(\w+)', function($name, $commit){
	echo "get " . $name . " - commit " . $commit;
});

/**
 * Info of this server
 */
$router->get('/check/server', function(){
	echo "server up and running";
});

$router->set404(function(){
	header("HTTP/1.0 404 Not Found");
	echo "ERROR: unknown API request";
	die();
});

/**
 * Make it listen to the routes
 */
$router->run();