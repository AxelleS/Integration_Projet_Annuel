<?php 

class StatisticsController {

	public function indexAction($params)
    {

    	$date = date('Y-m-d').' %';
		$users = new User();
		$users->setDateInserted($date);
		$response_stat = $users->count('date_inserted');
		$stats['number_insert_today'] = $response_stat->fetch();
		//$response_stat = $users->count()


        $v = new View('statistics','back');
        // $v->assign("donnees",$donnee_stat);
    }

    public function editAction($params){}

    public function saveAction($params){}

}

 ?>