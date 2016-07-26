<?php

require_once 'Tools.class.php';
require_once 'Dbase.class.php';
require_once 'User.class.php';

class Img
{
	public $author;
	public $img;

	public function __construct ($kwargs) {
		if ($kwargs == null)
			return ;
		if (array_key_exists("author", $kwargs) && array_key_exists("img", $kwargs))
		{
			$this->author = $kwargs['author'];
			$this->img = $kwargs['img'];
		}
	}

	public function create(){
		$db = DataBase::getInstance();
		$prep = $db->prepare("INSERT INTO imgs (id, author, img) VALUES (?, ?, ?)");
		$prep->execute(array($this->author, $this->img));
	}

	public static function fromAuthor( $author ) {
		$db = Database::getInstance();
		$prep = $db->prepare("SELECT * FROM posts WHERE author = ? ORDER BY date DESC");
		if ($prep->execute(array($author)))
			return $prep->fetchAll(PDO::FETCH_OBJ);
		else
			return array();
	}
}

?>