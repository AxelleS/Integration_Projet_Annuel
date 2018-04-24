<?php 

class SignoutController {

	public function indexAction($params){
		$_SESSION['token'] = "";
		session_destroy();
		header("Location: ".DIRNAME.Route::getSlug('index','index'));
	}
}

 ?>