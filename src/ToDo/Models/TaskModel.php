<?php
namespace ToDo\Models;

use ToDo\Lib\Core;
use PDO;

use ToDo\Controllers\User;

class TaskModel {

	protected $core;

	function __construct() {
		global $app;
		$this->app = $app;

		$this->core = Core::getInstance();
		$this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->User = new User();
	}

  /*
	 * Get all tasks
	 *
	 * This query will return all the tasks under the "tasks" table
	 */
	public function allTasks () {

		$sql = "SELECT * FROM tasks";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$r = 0;
		}

		return $r;
	}
  
	/*
	 * Get all tasks for single user
	 *
	 * This query will return all the tasks under the "tasks" table
	 * where the user_id = whatever is passed as $uid
	 */
	public function userTasks ($uid) {

		$sql = "SELECT * FROM tasks WHERE user_id = $uid";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$r = 0;
		}

		return $r;
	}

	/*
	 * Get data for a single task
	 */
	public function singleTask ($id) {

		$sql = "SELECT * FROM tasks WHERE id = $id";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {
			$r = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$r = 0;
		}

		return $r;
	}


	/*jsw324 attempt at deleting tasks */ 
	public function deleteTask ($taskID) {

		//get task ID
		$this->app->request->post('taskID');

		//Implement logic to check the user editing the task.

		//task ID belongs to the user
		$sql = "DELETE FROM tasks WHERE id = $taskID";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {

			$returnData = array(
				'status' 	=> 'success',
				'msg' 		=> 'Task has been deleted.'
			);

		} else {

			$returnData = array(
				'status' 	=> 'fail',
				'msg' 		=> 'Task could not be deleted.'
			);

		}
		return $returnData;
	}

	// jsw324 attempt at getting single task from userID - will use this to edit
	public function editTask() {

		//get task ID

		//get fields with potential of being edited.
		$taskID 			= $this->app->request->post('taskid');
		$taskName 			= $this->app->request->post('task_name');
		$taskDescription 	= $this->app->request->post('task_description');
		$taskDueDate		= $this->app->request->post('task_due_date');
		$taskImportance 	= $this->app->request->post('task_importance');

		//Implement logic to check the user editing the task.
		
		//update fields in table 'tasks' where passed $taskID == taskID in table.
		$sql = "UPDATE tasks SET name = :task_name, description = :task_description, due_date = :task_due_date, importance = :task_importance WHERE id = :taskid";
		$stmt = $this->core->dbh->prepare($sql);
		
		//does it execute?
		if ($stmt->execute(
			array(
				':task_name'		=> $taskName,
				':task_description' => $taskDescription,
				':task_due_date' 	=> $taskDueDate,
				':task_importance' 	=> $taskImportance,
				':taskid'  			=> $taskID
			)

			)) {

			$returnData = array(
				'status' 	=> 'success',
				'msg' 		=> 'Task edited'
			);

		} else {

			$returnData = array(
				'status' 	=> 'error',
				'msg' 		=> 'Error: Task not edited'
			);
		}

		return $returnData;
	}

	public function saveTask() {

		//If we're in local development mode, we can create a sample task.
		if ($this->app->getMode() === 'dev') {

			$taskName 			= "Example Task";
			$taskDescription 	= "Tesla destroyed all records of his earthquake machine, fearing the damage it could do in the wrong hands.";
			$taskStartDate 		= "2016-06-28 12:25:00";
			$taskDueDate		= "2016-07-01 12:25:00";
			$taskImportance 	= "Highly";
			$userID 			= '1';
		} else {

			// get task ID and fields
			$taskName 			= $this->app->request->post('task_name');
			$taskDescription 	= $this->app->request->post('task_description');
			$taskStartDate 		= $this->app->request->post('start_date');
			$taskDueDate 		= $this->app->request->post('due_date');
			$taskImportance 	= $this->app->request->post('task_importance');
			$userID 			= $this->app->request->post('user_id');
		}

		$sql = "INSERT INTO tasks (name, description, start_date, due_date, importance, user_id) VALUES (:task_name, :task_description, :start_date, :due_date, :task_importance, :user_id)";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute(
			array(
				':task_name' 		=> $taskName,
				':task_description' => $taskDescription,
				':start_date' 		=> $taskStartDate,
				':due_date' 		=> $taskDueDate,
				':task_importance' 	=> $taskImportance,
				':user_id' 			=> $userID
			)
		)) {

			$returnData = array(
				'status' 	=> 'success',
				'msg' 		=> 'Task Entered successfully!'
			);

		} else {

			$returnData = array(
				'status' 	=> 'error',
				'msg' 		=> 'Error: Task not saved.'
			);
		}

		return $returnData;
	}

	/*
	 * Update a task to show it's complete / incomplete
	 */
	public function markTask ($taskID, $status = 'complete') {

		if ($status == 'complete') {
			$status = 'Yes';
		} else if ($status == 'incomplete') {
			$status = 'No';
		}

		$sql = "UPDATE tasks SET is_complete = :status WHERE id = :taskid";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute(
			array(
				':status' 	=> $status,
				':taskid' 	=> $taskID
			)
		)) {

			$returnData = array(
				'status' 	=> 'success',
				'msg' 		=> 'The task has been updated to '.$status
			);

		} else {

			$returnData = array(
				'status' 	=> 'error',
				'msg' 		=> 'Error: The task could not be updated.'
			);
		}

		return $returnData;
	}

}
