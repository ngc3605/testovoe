<?php


namespace App\models;
use App\core\Db;
class Message extends \App\core\Model {


	public const TABLE = 'messages';

	public $id = '';
	public $title = '';
	public $preview = '';
	public $content = '';
	public $author = ''; 


	public static function findAll(){
		$sql = 'SELECT messages.id, messages.title, messages.preview, messages.content, users.name as author FROM messages, users WHERE messages.author = users.id';
		$db = new Db;
		$db->connection();
		
		$data = $db->query([], $sql, static::class);
		
		return $data;
	}
	public function findById($id){
		$sql = 'SELECT messages.id, messages.title, messages.preview, messages.content, users.name as author FROM messages, users WHERE messages.author = users.id AND messages.id = :id';
		$db = new Db;
		$db->connection();
		$data = $db->query(['id' => $id[0]], $sql, static::class);
		
		return $data;
		
	}
	public function addMessage($title, $content, $author){

		$preview = substr($content, 0, 50);

		$sql = 'INSERT INTO messages (title, preview, content, author) VALUES (:title, :preview, :content, :author)';
		
		$db = new Db;
		$db->connection();
		$db->addRow(['title' => $title, 'preview' => $preview, 'content' => $content, 'author' => $author], $sql, static::class);

	}


	
	
}