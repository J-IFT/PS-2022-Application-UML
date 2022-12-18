<?php

class Account{
	public $name;
	public $firstname;
	public $pwd;
	public $number;
	public $history;
	public $opened;
	public $state;
	public $mail;

	function __construct($mail,$pwd){
		$this->mail = $mail;
		$this->pwd		= $pwd;
	}

	function login(){
		$account_query = DB::query("
			SELECT name, firstname, number, history, opened, state
			FROM account 
			WHERE mail = '".DB::str($this->mail)."'
				AND password = '".DB::str($this->pwd)."'
		");
		if($account = DB::fetch($account_query)){
			$this->firstname = $account['firstname'];
			$this->name 	 = $account['name'];
			$this->number    = $account['number'];
			$this->history   = $account['history'];
			$this->opened    = $account['opened'];
			$this->state     = $account['state'];
			return true;
		}
		return false;
	}
}