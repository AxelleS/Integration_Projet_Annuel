<?php

class Cookie {

    public static function generateCookie(){
    	if(!isset($_COOKIE['cookie'])){
    		//Création de cookie
	        $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
	        $cookie = str_shuffle($char);
	        $date = date("Y-m-d H:i:s"); 
	        setcookie('cookie', $cookie, time() + 24*3600, "/");	
    	}
    }
}