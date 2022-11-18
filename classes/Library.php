<?php
include 'DB.php';
include 'Catalog.php';
include 'Account.php';

class Library {
	public $name;
	public $address;
	public $catalog;
	public $accounts = array();

	function __construct(){
		DB::connect();
		$this->name = 'La Blibliotek';
		$this->adresse = '1 rue du prout, 38400, Saint-Martin D\'Hères';
		$this->catalog = new Catalog();
		// $account_query = DB::query("
		// 	SELECT number
		// 	FROM account
		// ");
		// while($account = DB::fetch($account_query)){
		// 	var_dump($account['number']);
		// 	array_push($this->accounts, new Account($account['number']));
		// }
	}

	function login($username,$pwd){
		$account = new Account($username,$pwd);
		if($account->login()){
			array_push($this->accounts, $account);
			header('Location: recherche.php');
		}else{
			echo 'login error';
		}

	}
}