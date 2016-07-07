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
	 * Fetch all tasks
	 */
	public function AllTasks() {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->allTasks($uid));
	}

	/*
	 * Fetch a single user's task list (all)
	 */
	public function UserTasks($uid) {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->userTasks($uid));
	}

	/*
	 * Fetch a single task
	 */
	public function SingleTask($id) {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->singleTask($id));
	}

	//jsw324 attempt
	public function DeleteTask($taskID) {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->deleteTask($taskID));
	}

	//jsw324 attempt
	public function EditTask() {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->editTask());
	}

	public function SaveTask() {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->saveTask());
	}

	/*
	 * Mark a task as complete or incomplete depending on the route used
	 */
	public function MarkTask($taskID, $status) {

		header("Content-Type: application/json");
		echo json_encode($this->TaskModel->markTask($taskID, $status));
	}
}
