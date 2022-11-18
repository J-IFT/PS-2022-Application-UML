<?php
include 'DB.php';

class Author {
	public $name;
	public $biography;
	public $birthDate;

	function __construct($name){
		DB::connect();
		$author_query = DB::query("
			SELECT biography, birthDate
			FROM author
			WHERE name = ".DB::str($name)."
		");
		$author = DB::fetch($author_query);
		if($author){
			$this->name      = $name;
			$this->biography = $author['biography'];
			$this->birthDate = $author['birthDate'];
		}
	}
}