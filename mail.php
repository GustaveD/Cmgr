<?php
	session_start();
	require_once 'class/Dbase.class.php';
	require_once 'class/User.class.php';

	if (isset($_GET['type']))
	{
		$type = DataBase::no_sql_injection($_GET['type']);
		switch($type){
			case "valid" : {
	
				if (isset($_GET['code'])){
					$code = DataBase::no_sql_injection($_GET['code']);
	
					$db = DataBase::getInstance();
					$prep = $db->prepare("SELECT * FROM users WHERE 	name=?	");
					$prep->execute(array($code));
					$use = $prep->fetch();
					$user = User::query($use['id']);
					$user->state = User::REGISTER;
					$user->update();			
					header('Location: ./index.php');
				} else 
					echo "Problem with type";
				break;
			}
			case "forgot" : {
				if (isset($_GET['mail'])){
					$mail = DataBase::no_sql_injection($_GET['mail']);
				
				if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
					echo "bad email";
				}
					$db = Database::getInstance();
					$prep = $db->prepare("SELECT * FROM users WHERE mail=?");
					$prep->execute(array($mail));
					if ($prep->rowCount() == 0) {
						echo "no User with this email";
					}
					$prep->setFetchMode(PDO::FETCH_INTO, new User(null	));
					$user = $prep->fetch();
					$pwd = Tools::random_string(16);
					$user->password = hash('whirlpool', $pwd);
					$user->update();
					Tools::sendEmail(Tools::FORGOT_TYPE, $user, $pwd);
					echo "mail send";
				}
				else
					echo "Problem with Email";
				break;
			}
		}
	} else
		echo "ENCULER";
?>