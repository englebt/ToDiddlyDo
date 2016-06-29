<?php

namespace ToDo\Lib;

class Config {
	static $confArray;

	public static function read($name) {
		return self::$confArray[$name];
	}

	public static function write($name, $value) {
		self::$confArray[$name] = $value;
	}
}

//Set our environment
//local, dev, prod
$platform = 'local';
Config::write('environment', $platform);

if ($platform === 'prod' || $platform === 'dev'){

	Config::write('db.host', 'localhost');
	Config::write('db.port', '');
	Config::write('db.basename', '');
	Config::write('db.user', '');
	Config::write('db.password', '');
}

if ($platform === 'local'){

	Config::write('db.host', '127.0.0.1');
	Config::write('db.port', '');
	Config::write('db.basename', 'todo');
	Config::write('db.user', 'listmngt');
	Config::write('db.password', '88_3oBA1#1^');
}