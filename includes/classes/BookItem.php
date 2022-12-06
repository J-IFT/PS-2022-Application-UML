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

	function __construct($barcode, $rfid, $isbn){
		
	}
}