<?php
include 'BookItem.php';

class Catalog {
	public $records;

	function __construct(){
		// $bookItem_query = DB::query("
		// 	SELECT barcode, tag, isbn
		// 	FROM bookitem
		// ");
		// while($bookItem = DB::fetch($bookItem_query)){
		// 	array_push($this->records, new BookItem($bookItem['barcode'],$bookItem['tag'],$bookItem['isbn']));
		// }
	}
}