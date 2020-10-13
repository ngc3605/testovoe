<?php

namespace App\core;
use App\models\User;
class Db {

	public $db;

	public function connection(){
		$data = (include __DIR__.'/config.php')['db'];
		$this->db = new \PDO('mysql:host='.$data['host'].';dbname='.$data['dbname'],$data['login'],$data['password']);
	}
	public function fetchByOne($arr = [], $sql, $class){
		$stm = $this->db->prepare($sql);
	
		$stm->execute($arr);
		$obj = new User;
		while ($row = $stm->fetch()) {
			$obj->id = $row['id'];
			$obj->name = $row['name'];
			$obj->password = $row['password'];

			
		}
		return $obj;
	}
	public function addRow($arr, $sql){
		$stm = $this->db->prepare($sql);

		$stm->execute($arr);
	}
	
	public function query($arr = [], $sql, $class){

		// if($arr){
		// 	$stm = $this->db->prepare($sql);
	
		// 	$stm->execute($arr);
		// 	return true;
		// } 

		$stm = $this->db->prepare($sql);
	
		$stm->execute($arr);
		

		$data = $stm->fetchAll(\PDO::FETCH_ASSOC);
		
		$result = [];
		foreach ($data as $key => $row) {
			$obj = new $class;
			foreach ($row as $key => $value) {
				if(is_numeric($key)){
						continue;
					}

				$obj->$key = $value;

			}
			$result[] = $obj;
		}
		return $result;

	}
}


