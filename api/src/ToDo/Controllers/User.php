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

		echo 'User API route';
	}

	/*
	 * Process login form
	 */
	public function Login() {
	}

	/*
	 * Process signup form
	 */
	public function Register() {
	}

}
