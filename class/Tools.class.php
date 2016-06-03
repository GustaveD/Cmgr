<?php

class Tools{
	const VALID_TYPE = 0;
	const FORGOT_TYPE = 1;
	const NEW_COMMENT = 2;

	public static function gen_uuid(){
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
	}
	public static function is_uuid( $uuid ) {
		if (!is_string($uuid) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $uuid) !== 1) || strlen($uuid) != 36)
		    return false;
		else
			return true;
	}
	public static function sendEmail($type, $user, $other = null){
		switch ($type) {
			case Tools::VALID_TYPE : {
				//creer un cookie
				$token = Tools::gen_uuid();
				$db = Dbase::getInstance();
				$prep = $db->prepare("INSERT INTO tokens (id, user, type) VALUES (?, ?, ?)");
				$prep->execute(array($token, $user->id, "REGISTER"));

				//prendre le patron et remplacer les variables et envoyer le mail
				$content = file_get_contents('./mail_template/register.html');
				$content = preg_replace("/%name%/", $user->name, $content);
				$content = preg_replace("/%url%/", "http://" . $_SERVER['HTTP_HOST'] . "mail.php?type=valid&code=" . $token, $content);
				mail($user->mail, "Valid yur account to use our site !", $content, "from :noreply@tof-ouf.com\r\nContent-type:text/html;charset=UTF-8\r\n");
				break;
			}
			
			default:
				# code...
				break;
		}

	}
}

?>