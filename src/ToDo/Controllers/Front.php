<?php

namespace ToDo\Controllers;

class Front {

	protected $core;

	public function __construct() {

		global $app;
		$this->app = $app;
	}

	/*
	 * If you request  local.todolist.com:8008/
	 * this is what shows up
	 */
	public function Index (){

		$data = [
			'exampleVar' => 'I am enexample'
		];

		//Pulls the view from www/views/main/
		$this->app->render('mainViews/main.twig', $data);
	}

}