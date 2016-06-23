<?php

$Main = new \ToDo\Controllers\Main();
$User = new \ToDo\Controllers\User();

//The main index of the API - used for documentation and examples of API requests
$app->get('/', function () use ($app, $Main) {
	$Main->Index();
});

/*
 * USERS
 *
 * These API calls are for User related data
 */

$app->get('/users/all', function () use ($app, $User) {
	$User->AllUsers();
});