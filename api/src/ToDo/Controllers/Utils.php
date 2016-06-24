<?php

namespace ToDp\Controllers;

class Utils {

	protected $core;

	public function __construct() {
		global $app;
		$this->app = $app;
	}

	/*
	 * Returns the time since the input $date
	 */
	public function timeSince($date) {

		$time = strtotime($date);

		$time = time() - $time; // to get the time since that moment
		$time = ($time<1)? 1 : $time;
		$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);

		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);

			return $numberOfUnits.' '.$text.(($numberOfUnits>  1)? 's' : '');
		}
	}
}