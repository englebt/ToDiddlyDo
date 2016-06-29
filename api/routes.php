<?php

//Load up our classes that we'll use in the routes
$Main = new \ToDo\Controllers\Main();
$User = new \ToDo\Controllers\User();
$Task = new \ToDo\Controllers\Task();

/*
 * Example Route Usage
 *
 * $app->get('/', function () use ($app, $Main) {
 *
 * $app is the Slim environment, it allows us to access the Framework inside our classes
 * $Main is the controller name we're passing into the route to fetch the Class/Method
 *
 * $Main->Index();
 *
 * This is accessing the Main Controller, and then calling upon the Index() method
 *
 * });
 *
 * This is to close it all up, nice and tidy.
 */

//The main index of the API - used for documentation and examples of API requests
$app->get('/', function () use ($app, $Main) {
	$Main->Index();
});

/*
 * USERS
 *
 * These API calls are for User related data
 */

//Get all of the users
$app->get('/users/all', function () use ($app, $User) {
	$User->AllUsers();
});

//Get a single user
$app->get('/user/:id', function ($id) use ($app, $User) {
	$User->SingleUser($id);
});

//Register a user
$app->get('/user/register', function () use ($app, $User) {
	$User->Register();
});

//Login a user
$app->get('/user/login', function () use ($app, $User) {
	$User->Login();
});

//Logout a user

//Forgot password


/*
 * TASKS
 *
 * These API calls are for User Tasks related data
 */

//Get all the tasks for a user
$app->get('/usertasks/:uid', function ($uid) use ($app, $Task) {
	$Task->UserTasks($uid);
});


//Get a single task
$app->get('/task/single/:id', function ($id) use ($app, $Task) {
	$Task->SingleTask($id);
});

//Create a task
$app->get('/task/create', function () use ($app, $Task) {
	$Task->SaveTask();
});

//Edit a task
$app->get('/task/edit', function () use ($app, $Task) {
	$Task->EditTask();
});

//Delete a task
$app->get('/task/delete/:id', function ($id) use ($app, $Task) {
	$Task->DeleteTask($id);
});

//Mark a task as complete/incomplete
$app->get('/task/mark/:id/:status', function ($id, $status) use ($app, $Task) {
	$Task->MarkTask($id, $status);
});


