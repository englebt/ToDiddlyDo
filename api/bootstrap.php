<?php

//Load all of our controllers
function autoload_controllers($class_name) {
	$file = '/src/Controllers/' . $class_name. '.php';

	if (file_exists($file))  {
		require_once($file);
	}
}

//Load all of our models
function autoload_models($class_name) {
	$file = '/src/Models/' . $class_name. '.php';

	if (file_exists($file))  {
		require_once($file);
	}
}

//Run the autoloader
spl_autoload_register('autoload_controllers');
spl_autoload_register('autoload_models');