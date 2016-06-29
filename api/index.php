<?php
require_once(__DIR__ . '/vendor/autoload.php');

//Create our SLIM app environment
$app = new \Slim\Slim(array(

	//Our app's current environment
	'mode' => 'dev',

	//Output errors in Dev
	'debug' => true,
));

//Setup our Session middleware
$app->add(new \Slim\Middleware\SessionCookie(array(
	'expires' => '8765 hours',
	'path' => '/',
	'domain' => null,
	'secure' => false,
	'httponly' => false,
	'name' => 'cobra_orangetd',
	'secret' => 'fe_33!90CVa',
	'cipher' => MCRYPT_RIJNDAEL_256,
	'cipher_mode' => MCRYPT_MODE_CBC
)));

//Include our routes
require_once('routes.php');

//Initiate the Slim App Environment
$app->run();