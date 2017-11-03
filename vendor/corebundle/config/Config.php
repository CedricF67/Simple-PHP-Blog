<?php

namespace Config;

class Config {

	private $settings = [];
	private static $_instance;

	// Makes sure this is a singletron so Config is only instanced once :

	public static function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new Config();
		}
		return self::$_instance;
	}

	// Load the Config.php file :

	public function __construct() {
		$this->settings = require dirname(dirname(dirname(__DIR__))) . '/app/config/Config.php';
	}

	// Getter to get database informations based on Config.php file :

	public function get($key) {
		if (!isset($this->settings[$key])) {
			return null;
		}
		return $this->settings[$key];
	}

}