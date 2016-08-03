<?php

require_once './class/Dbase.class.php';
require_once './class/User.class.php';

class Comment{

	public $id;
	public $post;
	public $author;
	public $state;
	public $content;
	public $date;

	public function __construct($kwargs){
		if ($kwargs == null)
			return ;
		if (array_key_exists("autor", $kwargs) && array_key_exists("content", $kwargs)
			&& array_key_exists("post", $kwargs)){
			$this->author = $kwargs['author'];
			$this->post = $kwargs['post'];
			$this->content = $kwargs['content'];
			$this->state = "SHOWN";
		}
	}
	public function create(){
		$db = DataBase::getInstance();
		$prep = $db->prepare("INSERT INTO comments (id, post, author, state, content) VALUES (?, ?, ?, ?, ?)");
		$prep->execute(array($this->id, $this->post, $this->author, $this->state, $this->content));
	}

	public function query($author){
		$db = DataBase::getInstance();
		$prep = $db->prepare("SELECT * FROM comments WHERE author = '$author'");
		$prep->setFetchMode(PDO::FETCH_INTO, new Comment(null));
		if ($prep->execute())
			return $prep->fetch();
		else
			return null;
	}
}

?>