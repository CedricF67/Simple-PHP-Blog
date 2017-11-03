<?php

namespace config;

use \PDO;

class Database {

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}

	// Connect to database using PDO :

	private function getPDO() {
		if ($this->pdo === null) { // Make sure to connect to database only if not already connected
		$pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . '', '' . $this->db_user . '', '' . $this->db_pass . '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	// List all posts :

	public function select() {
		$query = $this->getPDO()->query('SELECT id, title, subtitle, author, DATE_FORMAT(createddate, \'%d/%m/%Y à %Hh%i\') AS createddate, DATE_FORMAT(modifieddate, \'%d/%m/%Y à %Hh%i\') AS modifieddate, content FROM post ORDER BY id DESC');
		$data = $query->fetchall(PDO::FETCH_OBJ);
		return $data;
	}

	// Show a specific post based on its id :

	public function show($attributes) {
		$query = $this->getPDO()->prepare('SELECT id, title, subtitle, author, DATE_FORMAT(createddate, \'%d/%m/%Y à %Hh%i\') AS createddate, DATE_FORMAT(modifieddate, \'%d/%m/%Y à %Hh%i\') AS modifieddate, content FROM post WHERE id = :id');
		$query->execute($attributes);
		$data = $query->fetchall();
		return $data;
	}

	// Insert a post in the database :

	public function insert($attributes) {
		$query = $this->getPDO()->prepare('INSERT INTO post (title, subtitle, author, createddate, modifieddate, content) VALUES (:title, :subtitle, :author, now(), now(), :content)');
		$query->execute($attributes);
		return $query;
	}

	// Update a post based on it's id :

	public function update($attributes) {
		$query = $this->getPDO()->prepare('UPDATE post SET title = :title, subtitle = :subtitle, author = :author, modifieddate = now(), content = :content WHERE id = :id');
		$query->execute($attributes);
		return $query;
	}

	// Delete a post from the database based on its id :

	public function delete($attributes) {
		$query = $this->getPDO()->prepare('DELETE FROM post WHERE id = :id');
		$query->execute($attributes);
		return $query;
	}

	// Get the last id from tha table :

	public function lastid() {
		$query = $this->getPDO()->query('SELECT MAX(id) FROM post');
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

}