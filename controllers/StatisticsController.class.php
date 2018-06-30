<?php 

class StatisticsController {

	public function indexAction($params)
    {
    	$user = new User();
    	$response_stat = $user->select('id');
    	var_dump($response_stat);exit;
     //    $donnee_stat = $response_stat->fetch();


        $v = new View('statistics','back');
        // $v->assign("donnees",$donnee_stat);
    }

    public function editAction($params){}

    public function saveAction($params){}

}

 ?>