<?php

$Main = new \ToDo\Controllers\Main();

//The main index of the API - used for documentation and examples of API requests
$app->get('/', function () use ($app, $Main) {
	$Main->Index();
});