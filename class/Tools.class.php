<?php

class Tools{

	const VALID_TYPE = 0;
	const FORGOT_TYPE = 1;
	const NEW_COMMENT = 2;

	public static function sendEmail($type, $user, $other = null){
		switch ($type) {
			case Tools::VALID_TYPE : {
				$content = file_get_contents('mail_template/register.html');
				$content = preg_replace("/%name%/", $user->name, $content);
				echo $content;
				mail($user->mail, "[Tof-ouf]Valid your account to use our site !", $content, "from :noreply@tof-ouf.com\r\nContent-type:text/html;charset=UTF-8\r\n");
				break;
			}
			case Tools::FORGOT_TYPE : {
				$content = file_get_contents('mail_template/forgot.html');
				$content = preg_replace("/%name%/", $user->name, $content);
				$content = preg_replace("/%password%/", $other, $content);
				mail($user->mail, "[Tof-ouf] Your new Pass is here!", $content, "from :noreply@tof-ouf.com\r\nContent-type:text/html;charset=UTF-8\r\n");
				break;
			}

			case Tools::NEW_COMMENT : {
				$content = file_get_contents('./mail_template/newcom.html');
				$content = preg_replace("/%name%/", $user->name, $content);
				$content = preg_replace("/%user_comment%/", $other->post, $content);
				$content = preg_replace("/%user_name%/", $other->author, $content);
				$content = preg_replace("/%url%/", "http://" . $_SERVER['HTTP_HOST'] . "/commentaire.php" . $other->post, $content);
				mail($user->mail, "[Tof-ouf] A user has commented your post!! check it out", $content, "From: noreply@tof-ouf.com\r\nContent-type:text/html;charset=UTF-8\r\n");
				break;
			}
			
			default:
				break;
		}

	}
	public static function random_string($length){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    	return substr(str_shuffle($chars), 0, $length);
	}

	public static function debug($var){
		echo '<pre>' . print_r($var, true) . '</pre>';
	}

	public static function verif_mdp($password){
		if ($password != strtolower($password) and strpbrk($password, '0123456789') !== false){
			return '1';
		} else{
			return '0';
		}
	}

}
?>