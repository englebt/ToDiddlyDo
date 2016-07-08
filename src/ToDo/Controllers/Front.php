<?php
namespace ToDo\Controllers;

use PDO;
use ToDo\Lib\Core;
use ToDo\Models\UserModel;
use ToDo\Models\TaskModel;

class Front {

	protected $core;

	public function __construct() {
		global $app;
		$this->app = $app;
    
    $this->core = Core::getInstance();
		$this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->UserModel = new UserModel();
		$this->TaskModel = new TaskModel();
	}

	/*
	 * If you request  local.todolist.com:8008/
	 * this is what shows up
	 */
	public function Index (){
    $userID = 1;

		$data = [
      'userID' => $userID,
      'tasks' => $this->TaskModel->userTasks($userID),
			'exampleVar' => 'I am enexample'
		];

		//Pulls the view from www/views/main/
		$this->app->render('mainViews/main.twig', $data);
    $this->app->render('mainViews/login.twig');
    $this->app->render('mainViews/register.twig');
	}

}
