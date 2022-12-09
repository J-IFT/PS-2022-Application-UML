<?php

DEFINE('LANG_1','Français');
DEFINE('LANG_2','Anglais');
DEFINE('LANG_3','Allemand');
DEFINE('LANG_4','Espagnol');
DEFINE('LANG_5','Italien');

DEFINE('FORMAT_1','Paperback');
DEFINE('FORMAT_2','Hardcover');
DEFINE('FORMAT_3','Audiobook');
DEFINE('FORMAT_4','Audio CD');
DEFINE('FORMAT_5','MP3 CD');
DEFINE('FORMAT_6','PDF');

DEFINE('ACCOUNT_STATE_1','Active');
DEFINE('ACCOUNT_STATE_2','Frozen');
DEFINE('ACCOUNT_STATE_3','Closed');

include 'classes/Library.php';
include 'classes/DB.php';
session_start();
DB::connect();
// if(!isset($_SERVER['library'])){
// 	$_SERVER['library'] = new Library();
// }