<?php
namespace ToDo\Controllers;

use ToDo\Lib\Core;
use PDO;

use ToDo\Models\UserModel;

class User {

	protected $core;

	function __construct() {
		global $app;
		$this->app = $app;

		$this->core = Core::getInstance();
		$this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->UserModel = new UserModel();
	}

	/*
	 * Primary route for the User API
	 */
	public function Index () {

	}

	/*
	 * Process login form
	 */
	public function Login() {
		header("Content-Type: application/json");
		echo json_encode($this->UserModel->login());
	}

	/*
	 * Process signup form
	 */
	public function Register() {
		header("Content-Type: application/json");
		echo json_encode($this->UserModel->register());
	}

	/*
	 * Fetch all of the users
	 */
	public function AllUsers() {

		header("Content-Type: application/json");
		echo json_encode($this->UserModel->allUsers());
	}

	/*
	 * Fetch a single user
	 */
	public function SingleUser($id) {

		header("Content-Type: application/json");
		echo json_encode($this->UserModel->singleUser($id));
	}

}
