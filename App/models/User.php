<?php

namespace App\models;
use App\core\Db;
class User extends \App\core\Model{


	public const TABLE = 'users';
	public $id = '';
	public $name = '';
	public $password = '';

	public static function findAll(){
		$sql = 'SELECT * FROM '. static::TABLE;
		User::query($sql);
	}

	public static function addUser($name, $password){
		$sql = 'INSERT INTO users (name, password) VALUES (:name, :password)';
		$db = new Db;
		$db->connection();
		
		$db->query(['name' => $name, 'password' => $password], $sql, static::class);

		

	}
	public static function checkUser($name, $password){

		$sql = 'SELECT * FROM users WHERE users.name= :name';
		$db = new Db;
		$db->connection();
		$obj = $db->fetchByOne([':name' => $name], $sql, static::class);
		
		if($obj->password == $password){
			return $obj->id;
		} else {
			return 'Неверный логин или пароль'; 
		}

	}

	
}