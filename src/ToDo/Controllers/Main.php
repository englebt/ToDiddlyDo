<?php

namespace ToDo\Controllers;

class Main {

	protected $core;

	public function __construct() {
		global $app;
		$this->app = $app;
    
	}

	/*
	 * If you request  local.todolist.com:8008/api
	 * this is what shows up
	 */
	public function Index (){    
		$this->app->render('apiViews/main.twig');
	}

}