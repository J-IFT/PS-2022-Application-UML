<?php
include 'Book.php';

class BookItem extends Book {
	public $barcode;
	public $tag;
	public $title;
	public $isReferenceOnly;
	public $numberOfPages;
	public $format;
	public $borrowed;
	public $lang;

	function __construct($barcode, $rfid, $isbn = null){
		$bookItem_query = DB::query("
			SELECT ISBN, title, numberOfPages, format, lang
			FROM bookitem
			WHERE barcode = ".DB::str($barcode)."
				AND tag= ".DB::str($rfid)."
		");
		if(DB::num_rows($bookItem_query)){
			$bookItem = DB::fetch($bookItem_query);
			parent::__construct($bookItem['ISBN']);
			$this->barcode 		 = $barcode;
			$this->tag	   		 = $isbn;
			$this->title   		 = $bookItem['title'];
			$this->numberOfPages = $bookItem['numberOfPages'];
			$this->format   	 = $bookItem['format'];
			$this->lang   		 = $bookItem['lang'];
		}
	}
}