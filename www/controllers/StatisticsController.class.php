<?php 

class StatisticsController {

	public function indexAction($params)
    {


    	$user = new User();
    	$response_stat = $user->select();
     	$donnee_stat = $response_stat->rowCount();
     	//var_dump($donnee_stat);exit;


        $v = new View('statistics','back');
        // $v->assign("donnees",$donnee_stat);
    }

    public function editAction($params){}

    public function saveAction($params){}

}

 ?>