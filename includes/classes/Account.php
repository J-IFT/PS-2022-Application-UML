<?php

class Account{
	public $username;
	public $pwd;
	public $number;
	public $history;
	public $opened;
	public $state;

	function __construct($username,$pwd){
		$this->username = $username;
		$this->pwd		= $pwd;
	}

	function login(){
		$account_query = DB::query("
			SELECT number, history, opened, state
			FROM account 
			WHERE username = '".DB::str($this->username)."'
				AND password = '".DB::str($this->pwd)."'
		");
		if($account = DB::fetch($account_query)){
			$this->number  = $account['number'];
			$this->history = $account['history'];
			$this->opened  = $account['opened'];
			$this->state   = $account['state'];
			return true;
		}
		return false;
	}
}