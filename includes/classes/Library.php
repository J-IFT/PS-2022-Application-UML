<?php
include 'Catalog.php';
include 'Account.php';

class Library {
	// global $test;
	public $name = 'La Blibliotek';
	public $address = '1 rue du prout, 38400, Saint-Martin D\'Hères';
	public static $catalog = array();
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

	public static function InitCatalogue(){
		$catalogue_query = DB::query("
			SELECT barcode, tag
			FROM bookitem
		");
		while($bookItem = DB::fetch($catalogue_query)){
			$book = new BookItem($bookItem['barcode'],$bookItem['tag']);
			array_push(self::$catalog, $book);
		}
	}

	public static function printCatalog(){
		foreach(self::$catalog as $bookItem){
			echo '
				<tr>
					<td>'.$bookItem->title.'</td>
					<td>'.$bookItem->author->name.'</td>
					<td>'.$bookItem->subject.'</td>
					<td>'.$bookItem->overview.'</td>
					<td>'.$bookItem->publisher.'</td>
					<td>'.$bookItem->publicationDate.'</td>
					<td>'.constant('LANG_'.$bookItem->lang).'</td>
					<td>'.$bookItem->tag.'</td>
					<td>
						<button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
						<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			';
		}
		if(is_null(self::$catalog)){
			echo '<tr>Aucun livre</tr>';
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