<?php


namespace App\models;
use App\core\Db;
class Comment extends \App\core\Model{

	public const TABLE = 'comments';

	public $id = '';
	public $author = '';
	public $content = '';
	public $id_message = '';
	public $name = '';

	public static function findCommentsForMessage($id_message){
		
		$sql = 'SELECT comments.content, users.name FROM comments LEFT JOIN users ON (id_message= :id_message) AND (users.id=comments.author)';
		
		$db = new Db;

		$db->connection();
		$data = $db->query(['id_message' => $id_message[0]], $sql, static::class);
		return $data;
		
	}
	public static function addComment($author, $content, $id_message){

		$sql = 'INSERT INTO comments  (author, content, id_message) VALUES (:author, :content, :id_message)';
		
		$db = new Db;

		$db->connection();
		$data = $db->addRow(['author' => $author, 'content' => $content, 'id_message' => $id_message], $sql, static::class);
	}

}