<?php
namespace ToDo\Models;

use ToDo\Lib\Core;
use PDO;

class UserModel {

	protected $core;

	function __construct() {
		global $app;
		$this->app = $app;

		$this->core = Core::getInstance();
		$this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/*
	 * Get all User's data
	 */
	public function allUsers () {

		$sql = "SELECT username, display_name, email, user_role, registered FROM users";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$r = 0;
		}

		return $r;
	}

	/*
	 * Get data for a specified User
	 */
	public function singleUser ($id) {

		$sql = "SELECT username, display_name, email, user_role, registered FROM users WHERE id = $id";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {
			$r = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$r = 0;
		}

		return $r;
	}

	/*
	 * Attempt to login a user
	 */
	public function login () {

		if (!$this->app->request->post('password') || !$this->app->request->post('email')){
			$returnData = array(
				'status' 	=> 'error',
				'msg' 		=> 'Please fill in all fields.'
			);
			return $returnData;
		}

		//Hash the user's password
		$hashedPass = hash('sha256', $this->app->request->post('password'));
		$email = $this->app->request->post('email');

		$sql = "SELECT * FROM users WHERE email=:email AND password=:pass";
		$stmt = $this->core->dbh->prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $hashedPass, PDO::PARAM_STR);

		if ($stmt->execute()) {

			$userInfo = $stmt->fetch();

			if(!empty($userInfo['email'])){

				$_SESSION['userID'] = $userInfo['id'];

				$returnData = array(
					'status' 	=> 'success',
					'msg' 		=> 'You have logged in.'
				);
				return $returnData;

			} else {

				$returnData = array(
					'status'	=> 'error',
					'msg' 		=> 'Could not log you in. Your password or email may be wrong.'
				);
				return $returnData;
			}

		} else {

			$returnData = array(
				'status' 	=> 'error',
				'msg' 		=> 'Could not log you in.'
			);

			return $returnData;
		}
	}

	/*
	 * Attempt to register a user
	 */
	public function register () {

		if (!$this->app->request->post('password') || !$this->app->request->post('email')){
			$returnData = array(
				'status' 	=> 'error',
				'msg' 		=> 'Please fill in all fields.'
			);
			return $returnData;
		}

		$email = $this->app->request->post('email');

		//Check for existing email
		if ($this->emailExists($email) > 0) {

			$returnData = array(
				'status' 	=> 'error',
				'msg'		=> 'An account with that email already exists.'
			);

			return $returnData;
		}

		try {

			//Hash the user's password
			$hashedPass = hash('sha256', $this->app->request->post('password'));

			$sql = "INSERT INTO users (email, password)
						VALUES (:email, :password)";
			$stmt = $this->core->dbh->prepare($sql);

			if ($stmt->execute(
				array(
					':email' 		=> $email,
					':password' 	=> $hashedPass,
				)
			)) {

				//Set their session
				$_SESSION['userID'] = $this->core->dbh->lastInsertId();;

				$returnData = array(
					'status' 	=> 'success',
					'msg' 		=> '<div class="alert alert-success">Creating your account.</div>'
				);

				return $returnData;
			}

		} catch (PDOException $e) {

			$returnData = array(
				'status' 	=> 'error',
				'msg' 		=> $e->getMessage()
			);

			return $returnData;
		}
	}

	/*
	 * Check if an email address already exists
	 * returns: 1 if email does exist
	 */
	private function emailExists ($email) {

		$stmt = $this->core->dbh->prepare("SELECT email FROM users WHERE email = '$email' LIMIT 1");
		$stmt->execute();

		return $count = $stmt->rowCount();
	}

}
