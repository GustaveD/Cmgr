<?php

require_once 'Tools.class.php';
require_once 'Dbase.class.php';
require_once 'User.class.php';

class Img
{
	public $id;
	public $author;
	public $img_path;

	public function __construct ($kwargs) {
		if ($kwargs == null)
			return ;
		if (array_key_exists("author", $kwargs) && array_key_exists("img_path", $kwargs))
		{
			$this->author = $kwargs['author'];
			$this->img_path = $kwargs['img_path'];
		}
	}

	public function create(){
		$db = DataBase::getInstance();
		$prep = $db->prepare("INSERT INTO imgs (id, img_path, author) VALUES (?, ?, ?)");
		$prep->execute(array($this->id,$this->img_path, $this->author));
	}

	public static function fromAuthor( $author ) {
		$db = Database::getInstance();
		$prep = $db->prepare("SELECT * FROM imgs WHERE author = ? ORDER BY date DESC");
		if ($prep->execute(array($author)))
			return $prep->fetchAll(PDO::FETCH_OBJ);
		else
			return array();
	}
}

?>