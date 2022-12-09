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

	function __construct($barcode, $rfid, $isbn = null){
		$bookItem_query = DB::query("
			SELECT * 
			FROM bookitem
			WHERE barcode = ".DB::str($barcode)."
				AND tag= ".DB::str($rfid)."
		");
		if(DB::num_rows($bookItem_query)){
			$bookItem = DB::fetch($bookItem_query);
			parent::__construct($bookItem['ISBN']);
			$this->barcode = $barcode;
			$this->tag	   = $isbn;
		}
	}
}