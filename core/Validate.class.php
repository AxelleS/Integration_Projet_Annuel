<?php
class Validate{

	public static function checkForm($allData){

		$errorsMsg = [];

		foreach ($allData as $key => $value) {
            if ($key == 'email_company' && !self::checkEmail($value)) {
                $errorsMsg['email_company']= "Format de l'email incorrect";
            }

		    if ($key == 'email' && !self::checkEmail($value)) {
                $errorsMsg['email']= "Format de l'email incorrect";
            }

            if ($key == 'password'){
                $password = $value;
                if (!self::checkPwd($value)) {
                    $errorsMsg['password']= "Mot de passe incorrect(Maj, Min, Chiffre, entre 6 et 32)";
                }
            }

            if ($key == 'passwordConf') {
		        $passwordConf = $value;
            }

            if ($key == 'years_old' && !self::checkAge($value)) {
                $errorsMsg['years_old'] = "L'âge doit être un entier supérieur à 18";
            }

            if ($key == 'phone' && !self::checkPhone($value)) {
                $errorsMsg['phone']= "Format du téléphone incorrect : XXXXXXXXXX";
            }

            if (($key == 'zipcode' || $key == 'zipcode_company') && !self::checkZipCode($value)) {
                $errorsMsg['zipcode']= "Format du code postal incorrect : XXXXX";
            }

            if ($key == 'capacity' && !self::checkNumber($value)) {
                $errorsMsg['capacity']= "La capacité n'est pas dans le bon format, un entier est attendu";
            }

            if ($key == 'response_captcha') {
		        $captcha['response'] = $value;
            }

            if ($key == 'url_facebook' && !self::checkFacebook($value)) {
                $errorsMsg['url_facebook']= "Format de l'url attendue incorrect  : https://www.facebook.com/XXXXX";
            }

            if ($key == 'url_twitter' && !self::checkTwitter($value)) {
                $errorsMsg['url_twitter']= "Format de l'url attendue incorrect  : https://twitter.com/XXXXX";
            }

            if ($key == 'url_youtube' && !self::checkYoutubeAccount($value)) {
                $errorsMsg['url_youtube']= "Format de l'url attendue incorrect  : https://www.youtube.com/channel/XXXXX";
            }

            if ($key == 'url_video' && !self::checkYoutubeVideo($value)) {
                $errorsMsg['url_video']= "Format de l'url attendue incorrect  : https://www.youtube.com/watch?v=XXXXX";
            }

            if ($key == 'price' && !self::checkNumber($value)) {
                $errorsMsg['price']= "Le prix n'est pas dans le bon format, un réel est attendu";
            }

            if ($key == 'pathBDD' && !self::checkURL($value)) {
                $errorsMsg['price']= "Le prix n'est pas dans le bon format, un réel est attendu";
            }
        }

        if(isset($password) && isset($passwordConf)) {
            if ($password != $passwordConf) {
                $errorsMsg['pwd_and_conf']= "Mot de passe et confirmation sont différents";
            }
        }

        if(isset($captcha['response'])) {
		    echo 'input: ' . $captcha['response'];
		    echo 'session : ' . $_SESSION['captcha'];
            if ($captcha['response'] != $_SESSION['captcha']) {
                $errorsMsg['captcha']= "Le captcha est incorrect";
            }
        }

		return $errorsMsg;
	}

	public static function maxString($string, $length){
		return strlen(trim($string))<=$length;
	}

	public static function minString($string, $length){
		return strlen(trim($string))>=$length;
	}

	public function maxNum($num, $length){
		return $num<=$length;
	}

	public function minNum($num, $length){
		return $num>=$length;
	}

	public static function checkEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public static function checkPwd($pwd){
		return strlen($pwd)>=6 && strlen($pwd)<=32 && 
		preg_match("/[a-z]/", $pwd) && 
		preg_match("/[A-Z]/", $pwd) && 
		preg_match("/[0-9]/", $pwd);
	}

	public static function checkNumber($number){
		return is_numeric(trim($number));
	}

    public static function checkAge($age){
	    $isCorrect = true;
	    if (!self::checkNumber($age)) {
            $isCorrect = false;
        } else {
            if ($age < 18) {
                $isCorrect = false;
            }
        }
        return $isCorrect;
    }

    public static function checkPhone($phone){
        if(substr($phone, 0, 1) != "0" || strlen(trim($phone)) != 10) {
            return false;
        } else {
            return true;
        }
    }

    public static function checkZipCode($zipcode){
        if(!preg_match("/[0-9]/", $zipcode) || (strlen(trim($zipcode)) != 5 &&  strlen(trim($zipcode)) != 3)) {
            return false;
        } else {
            return true;
        }
    }

    public static function checkFacebook($url){
        if(substr($url, 0, 25) != "https://www.facebook.com/" && substr($url, 0, 21) != "https://facebook.com/") {
            return false;
        } else {
            return true;
        }
    }

    public static function checkTwitter($url){
        if(substr($url, 0, 20) != "https://twitter.com/" && substr($url, 0, 24) != "https://www.twitter.com/") {
            return false;
        } else {
            return true;
        }
    }

    public static function checkYoutubeAccount($url){
        if(substr($url, 0, 32) != "https://www.youtube.com/channel/" && substr($url, 0, 28) != "https://youtube.com/channel/") {
            return false;
        } else {
            return true;
        }
    }

    public static function checkYoutubeVideo($url){
        if(substr($url, 0, 32) != "https://www.youtube.com/watch?v=" && substr($url, 0, 28) != "https://youtube.com/watch?v=") {
            return false;
        } else {
            return true;
        }
    }
}








