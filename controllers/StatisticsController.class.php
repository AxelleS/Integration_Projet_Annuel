<?php 

class StatisticsController {

	public function indexAction($params)
    {

    	$date = date('Y-m-d').'%';

        //Count du nombre de partie du jour
        //Necessite un join
        /*$game = new Calendar();
        $game->setDateCalendar($date);
        $game->set
        $response_game = $game->count('date_calendar');

        var_dump($response_game);exit;*/

        //Count du nombre de nouveau utilisateur ce jour
		$users = new User();
		$users->setDateInserted($date);
		$response_stat = $users->count('date_inserted');
		$stats['number_insert_today'] = $response_stat->fetch();
		
        //Count du nombre de reservation ce jour
        $resa = new Time_slot();
        $resa->setDateBill($date);
        $response_resa = $resa->count('date_bill');
        $stats['number_resa_today'] = $response_resa->fetch();

        //SELECT count(*) FROM calendar as c left join time_slot as t on t.id_calendar = c.id where t.id_user IS NOT NULL and c.date_calendar like "$date"


        $v = new View('statistics','back');
        // $v->assign("donnees",$donnee_stat);
    }

    public function editAction($params){}

    public function saveAction($params){}

}

 ?>