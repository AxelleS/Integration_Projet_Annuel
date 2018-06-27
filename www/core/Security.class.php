<?php

class Security {

    public static function isConnected(){
		if((isset($_SESSION['id_user'])) && (isset($_SESSION['token']))){
			$user = new User();
			$user->setId($_SESSION['id_user']);
			$response = $user->select('id');
			$donnees_user = $response->fetch();
	
			if($donnees_user['token'] == $_SESSION['token']) {
	
				$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
				$token = str_shuffle($char);
				$token = substr($token, 0, 11);
				$user = new User();
				$user->setId($_SESSION['id_user']);
				$user->setToken($token);
				$user->majToken();
	
				$_SESSION['token'] = $token;
	
				return true;
			} else {
				return false;
			}
		} else {
            return false;
        }
	}
}