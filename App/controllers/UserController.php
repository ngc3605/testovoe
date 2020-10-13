<?php

namespace App\controllers;
use App\models\User;
session_start();
class UserController {

	public $name = 'test';

	public $password;

	public $id;
	public $isPasswordRight = false;

	public function register(){
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$password = $_POST['password'];
			if($name == '' || $password == ''){
				echo 'Поля не должны быть пустыми';
				require __DIR__.'/../views/v_register.php';
			} else{
				User::addUser($name, $password);
				echo 'Вы зарегистрированны';
				require __DIR__.'/../views/v_index.php';
			}
			
		} else {
			
			require __DIR__.'/../views/v_register.php';

		}

		
		return true;
	}
	public function singin(){

		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$password = $_POST['password'];
			$result = User::checkUser($name, $password);
			
			if(is_numeric($result)){
				
				$_SESSION['auth'] = true;
				$_SESSION['name'] = $name;
				$_SESSION['id'] = $result;
				echo 'Привет '. $_SESSION['name'];
				
				require __DIR__.'/../views/v_index.php';
				
			} else {
				echo'неверный логин или пароль';
				require __DIR__.'/../views/v_singin.php';
			}
			
		} else {
			
			require __DIR__.'/../views/v_singin.php';
		}

		
	}



}