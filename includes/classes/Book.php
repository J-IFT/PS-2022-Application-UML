<?php 
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
			WHERE ISBN = ".DB::str($isbn)."
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
			SELECT a.name
			FROM author_book ab
			JOIN author a ON a.id = ab.author_id
			WHERE ab.book_id = ".DB::str($this->ISBN)."
		");
		if(DB::num_rows($author_query)){
			$author = DB::fetch($author_query);
			$this->author = new Author($author['name']);
		}
	}

}