<?php
include 'classes/Library.php';
include 'classes/DB.php';
session_start();
DB::connect();
if(!isset($_SERVER['library'])){
	$_SERVER['library'] = new Library();
}
global $a ;
$a = "Valeur initiale";
?>