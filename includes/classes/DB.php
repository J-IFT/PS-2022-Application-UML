<?php
class DB {
	static $db ;

	public static function connect() {
		try{
			self::$db = new mysqli("localhost", "root", "","umlapp");
		}catch (PDOException $e){   
			echo $e->getMessage();
		}
	}

	public static function query($sql){
		$result = self::$db->query($sql);
		if(!$result && self::$db->errno){
			echo '
				<div class="bg-light p-5 rounded">
					[SQL_ERROR] '.self::$db->error.'<br>
					"'.$sql.'"
				</div>
			';
		}
		return $result;
	}

	public static function insert($table,$data){
		$champs = '';
		$values = '';
		foreach($data as $champ => $value){
			$champs .= $champ.',';
			if(is_string($value)){
				$value = "'".$value."'";
			}
			$values .= $value.',';
		}
		$sql = "
			INSERT INTO ".$table." (".substr($champs, 0, -1).")
			VALUES (".substr($values, 0, -1).")
		";
		DB::query($sql);
		return self::$db->insert_id;
	}

	public static function fetch($query){
		if($query){
			return $query->fetch_assoc();
		}
	}

	public static function num_rows($query){
		return $query->num_rows;
	}

	//TODO à sécuriser
	public static function int($int){
		return $int;
	}

	//TODO à sécuriser
	public static function str($str){
		return $str;
	}
}

