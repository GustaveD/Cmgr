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
			$this->pass = hash("whirlpool", $kwargs['mail'] . $kwargs['password']);
			$this->state = USER::NEED_VALID;
		}
	}

	public function create(){
		$db = Database::getInstance();
		$i = $db->prepare("INSERT INTO users (id, mail, name, password, role, state) VALUES (?, ?, ?, ?, ?, ?)");
		$i->execute(array($this->id, $this->mail, $this->name, $this->pass, $this->role, $this->state));
	}
}

?>