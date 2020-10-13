<?php

namespace App\controllers;
session_start();
use App\models\Message;
use App\models\Comment;
session_start();
class MessageController{

	public function viewAll(){
		$messages = Message::findAll();
		require __DIR__.'/../views/v_messages.php';



	}
	public function viewById($id){

		if(isset($_POST['submit'])){
			Comment::addComment($_SESSION['id'], $_POST['contentCom'], $id[0]);
		}

		$message = new Message;
		$data = $message->findById($id);
		$comments = Comment::findCommentsForMessage($id);
		
		require __DIR__.'/../views/v_message.php';
	}
	public function add(){

		if(isset($_POST['submit'])){
			$title = $_POST['title'];
			$content = $_POST['content'];

			$user = $_SESSION['id'];
			
			$message = new Message;
			$message->addMessage($title, $content, $user);
				
			require __DIR__.'/../views/v_index.php';
		} else {
			require __DIR__.'/../views/v_addMessage.php';
		}
		



	}
}