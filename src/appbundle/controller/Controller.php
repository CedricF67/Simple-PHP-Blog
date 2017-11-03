<?php

namespace Controllers;

class Controller {

	protected $db;
	protected $config;
	protected $twig;

	public function __construct() {
      	// Loading configuration with DB parametters :
		$config = \Config\Config::getInstance();
      	
      	/* Loading database :
		Exemple to load a parametter : $config->get('db_name');
		Parametters are : db_user, db_pass, db_host, db_name */
		$this->db = new \Config\Database($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
	}

}