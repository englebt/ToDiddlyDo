<?php

$Main = new \ToDo\Controllers\Main();
$User = new \ToDo\Controllers\User();
$Task = new \ToDo\Controllers\Task();

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

$app->get('/user/:id', function ($id) use ($app, $User) {
	$User->SingleUser($id);
});


/*
 * TASKS
 *
 * These API calls are for User Tasks related data
 */
$app->get('/usertasks/:uid', function ($uid) use ($app, $Task) {
	$Task->UserTasks($uid);
});