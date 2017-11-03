<?php

namespace Entities;

class Post {

	// Atributes

	private $id, $author, $title, $subtitle, $createddate, $modifieddate, $content;

	// Construct

	public function __construct(array $data){
		$this->hydrate($data);
	}

	// Hydratation

	public function hydrate(array $data){
		foreach ($data as $key => $value){
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	// Getters

	public function getId(){
		return $this->id;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getSubtitle(){
		return $this->subtitle;
	}

	public function getCreateddate(){
		return $this->createddate;
	}

	public function getModifieddate(){
		return $this->modifieddate;
	}

	public function getContent(){
		return $this->content;
	}

	// Setters

	public function setId($id){
		$id = (int) $id;
		if ($id > 0){
			$this->id = $id;
		}
	}

	public function setAuthor($author){
		if(is_string($author)){
			$this->author = $author;
		}
	}

	public function setTitle($title){
		if(is_string($title)){
			$this->title = $title;
		}
	}

	public function setSubtitle($subtitle){
		if(is_string($subtitle)){
			$this->subtitle = $subtitle;
		}
	}

	public function setCreateddate($createddate){
		$this->createddate = $createddate;
	}

	public function setModifieddate($modifieddate){
		$this->modifieddate = $modifieddate;
	}

	public function setContent($content){
		if(is_string($content)){;
			$this->content = $content;
		}
	}
}

?>