<?php

class Security {

    public static function generateCaptcha(){
        $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $char = str_shuffle($char);
        $length = rand(-6,-5);
        $captcha = substr($char, $length);
        echo 'class : ' . $captcha;
        echo '<br>';
        $_SESSION['captcha'] = $captcha;
    }

    public static function isConnected(){
		if((isset($_SESSION['id_user'])) && (isset($_SESSION['token']))){
			$user = new User();
			$user->setId($_SESSION['id_user']);
			$response = $user->select('id');
			$donnees_user = $response->fetch();
			if ($donnees_user['status'] == 4) {
				$_SESSION['is_connected'] = false;
				return false;
			}
			else if($donnees_user['token'] == $_SESSION['token']) {
	
				$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
				$token = str_shuffle($char);
				$token = substr($token, 0, 11);
				$user = new User();
				$user->setId($_SESSION['id_user']);
				$user->setToken($token);
				$user->majToken();
	
				$_SESSION['token'] = $token;

				$_SESSION['is_connected'] = true;
				return true;
			} else {
				$_SESSION['is_connected'] = false;
				return false;
			}
		} else {
			$_SESSION['is_connected'] = false;
			return false;
		}
	}
}