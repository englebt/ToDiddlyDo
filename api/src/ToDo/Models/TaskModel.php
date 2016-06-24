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

}
