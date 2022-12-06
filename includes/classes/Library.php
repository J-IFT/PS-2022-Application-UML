<?php
include 'Catalog.php';
include 'Account.php';

class Library {
	// global $test;
	public $name = 'La Blibliotek';
	public $address = '1 rue du prout, 38400, Saint-Martin D\'Hères';
	public $catalog;
	public static $accounts = array();

	public static function login($username,$pwd){
		$account = new Account($username,$pwd);
		if($account->login()){
			array_push(self::$accounts, $account);
			$_SESSION['user_id'] = $account->number;
			// var_dump(self::$accounts);
			// var_dump(json_encode(self::$accounts));
		}else{
			echo '<br>[ERROR] - login error <br>';
		}
	}

	// public static function update 
	// public static function saveCache(){
	// 	$user_cache = fopen("cache/users.json","w");
	// 	fwrite($user_cache,json_encode(self::$accounts));
	// 	fclose($user_cache);
	// }

	// public static function UpdateCache(){
	// 	$json = file_get_contents("cache/users.json");
	// 	var_dump(json_decode($json));
	// 	foreach(json_decode($json) as $user){
	// 		echo '<br>'.var_dump($user);
	// 	}
	// }

	public static function getAccounts(){
		return self::$accounts;
	}
}