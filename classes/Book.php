<?php 
include 'DB.php';
include 'Author.php';

class Book {
	public $ISBN;
	public $name;
	public $subject;
	public $overview;
	public $publisher;
	public $publicationDate;
	public $lang;
	public $author;

	function __construct($isbn){
		DB::connect();
		$book_query = DB::query("
			SELECT name,subject,overview,publisher,publicationDate,lang
			FROM book
			WHERE ISBN = ".DB::str($this->ISBN)."
		");
		$book = DB::fetch($book_query);
		if($book){
			$this->ISBN 		   = $isbn;
			$this->name 	 	   = $book['name'];
			$this->subject 	 	   = $book['subject'];
			$this->overview 	   = $book['overview'];
			$this->publisher	   = $book['publisher'];
			$this->publicationDate = $book['publicationDate'];
			$this->lang 		   = $book['lang'];
		}
		$author_query = DB::query("
			SELECT author_name
			FROM table_liaison
			WHERE ISBN = ".DB::str($this->ISBN)."
		");
		while($author = DB::fetch($author_query)){
			$auth = new Author($author['author_name']);
			array_push($this->author, $auth);
		}
	}

}