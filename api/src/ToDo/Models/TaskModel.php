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
	/*jsw324 attempt at deleting tasks */ 
	public function deleteTask ($taskID) {

		//get task ID

		$this->app->request->post('taskID')

		//task ID belongs to the user

		$sql = "DELETE FROM tasks WHERE id = $taskID";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {

			$returnData = array(
				'status' => 'success',
				'msg' => 'Task has been deleted.'

				);

		} else {

			$returnData = array(
				'status' => 'fail',
				'msg' => 'Task could not be deleted'
				);

		}
		return $returnData;
	}

	// jsw324 attempt at getting single task from userID - will use this to edit
	public function editTask() {
		//get task ID
		//get fields with potential of being edited.
		$taskID = $this->app->request->post('taskID')
		$taskName = $this->app->request->post('task_name')
		$taskDescription = $this->app->request->post('task_description')
		$taskDueDate = $this->app->request->post('task_due_date')
		$taskImportance = $this->app->request->post('task_importance')
		
		//update fields in table 'tasks' where passed $taskID == taskID in table.
		
		$sql = "UPDATE tasks SET name = :task_name, description = :task_description, due_date = :task_due_date, importance = :task_importance WHERE id = :taskID";
		$stmt = $this->core->dbh->prepare($sql);
		
		//does it execute?

		if ($stmt->execute(
			array(
				':task_name' => $taskName,
				':task_description' => $taskDescription,
				':task_due_date' => $taskDueDate,
				':task_importance' => $taskImportance
				':taskid'  => $taskID
				)


			)) {

			$returnData = array(
				'status' => 'success'
				'msg' => 'Task edited'
				);

		} else {

			$returnData = array(
				'status' => 'error'
				'msg' => 'Error: Task not edited'
				);
		}
		return $returnData;
	}

	public function saveTask() {

		// get task ID and fields to udpate
		$taskID = $this->app->request->post('taskID')
		$taskName = $this->app->request->post('task_name')
		$taskDescription = $this->app->request->post('task_description')
		$taskStartDate = $this->app->request->post('start_date')
		$taskDueDate = $this->app->request->post('due_date')
		$taskIsComplete = $this->app->request->post('is_complete')
		$taskImportance = $this->app->request->post('task_importance')
		$userID = $this->app->request->post('user_id')

		$sql = "INSERT INTO tasks (name, description, start_date, due_date, is_complete, importance, user_id) VALUES (:task_name, :task_description, :start_date, :due_date, :is_complete, :task_importance, :user_id");
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute(
			array(
				':task_name' => $taskName,
				':task_description' => $taskDescription,
				':start_date' => $taskStartDate,
				':due_date' => $taskDueDate,
				':is_complete' => $taskIsComplete,
				':task_importance' => $taskImportance,
				':user_id' => $userID
				)
			)) {

			$returnData = array(
				'status' => 'success'
				'msg' => 'Task Entered succesfully!'

				); else {

			$returnData = array(
				'status' => 'error'
				'msg' => 'Error: Task not saved.'
				);

			}
			return $returnData;
		}
	}


}
