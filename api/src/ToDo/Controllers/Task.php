<?php
namespace ToDo\Controllers;

use ToDo\Lib\Core;
use PDO;

use ToDo\Models\UserModel;
use ToDo\Models\TaskModel;

class Task {

	protected $core;

	function __construct() {
		global $app;
		$this->app = $app;

		$this->core = Core::getInstance();
		$this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->UserModel = new UserModel();
		$this->TaskModel = new TaskModel();
	}

	/*
	 * Primary route for the Task API
	 * No direct access.
	 */
	public function Index () {
		echo 'No direct access.';
	}

	/*
	 * Fetch a single user's task list (all)
	 */
	public function UserTasks($uid) {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->userTasks($uid));
	}
	//jsw324 attempt
	public function DeleteTask($taskID) {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->DeleteTask($taskID));
	}
	//jsw324 attempt
	public function EditTask() {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->EditTask());

	}

}
