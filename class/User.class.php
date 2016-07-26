<?php

require_once 'Tools.class.php';
require_once 'Dbase.class.php';

class User{

	const USER = "USER";
	const ADMIN = "ADMIN";
	const MODERATOR = "MODERATOR";
	const NEED_VALID = "NEED_VALIDATION";
	const LOST_PWD = "LOST_PWD";
	const REGISTER = "REGISTERED";
	const DELTD = "DELETED";

	public $id;
	public $mail;
	public $name;
	public $pass;
	public $role;
	public $state;

	//CONSTRUCTEUR LORS DE LA CREATION D'UN COMPTE
	public function __construct ($kwargs){
		if ($kwargs == null)
			return ;
		if (array_key_exists("name", $kwargs) && array_key_exists("mail", $kwargs)
			&& array_key_exists("pass", $kwargs)){
			$this->mail = $kwargs['mail'];
			$this->name = $kwargs['name'];
			$this->role = isset($kwargs['role']) ? $kwargs['role'] : USER::USER;
			//$this->pass = $kwargs['pass'];
			$this->pass = hash("whirlpool", $kwargs['pass']);
			$this->state = USER::NEED_VALID;
			Tools::sendEmail(Tools::VALID_TYPE, $this);
		}
	}

	public function create(){
		$db = Database::getInstance();
		$i = $db->prepare("INSERT INTO users (id, mail, name, password) VALUES (?, ?, ?, ?)");
		$i->execute(array($this->id, $this->mail, $this->name, $this->pass));
	}

	public function update(){
		$db = DataBase::getInstance();
		$prep = $db->prepare("UPDATE users SET mail=?, name=?, password=?, state=? WHERE id = '$this->id'");
		$prep->execute(array($this->mail, $this->name, $this->password, $this->state));
	}

	public static function query($id){
		$db = DataBase::getInstance();
		$prep = $db->prepare("SELECT * FROM users WHERE id = '$id'");
		$prep->setFetchMode(PDO::FETCH_INTO, new User(null));
		if ($prep->execute())
			return $prep->fetch();
		else
			return null;
	}
}
?>
