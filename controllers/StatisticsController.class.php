<?php 

class StatisticsController {

	public function indexAction($params)
    {
        $v = new View('statistics','back');
        // $v->assign("donnees",$donnee_stat);
    }

    public function ajaxStatisticsAction($params){
        
        //Récupération de la date du jour 
        $date = date('Y-m-d').'%';
        $datem1 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-1, date('Y'))).'%';
        $datem2 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-2, date('Y'))).'%';
        $datem3 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-3, date('Y'))).'%';
        $datem4 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-4, date('Y'))).'%';
        $datem5 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-5, date('Y'))).'%';

        //Count du nombre de visite
        $visite = new Statistic();
        // $response_visi = $visite->count();
        // $stats['number_visite'] = $response_visi->fetch();

        //Count du nombre de visite ce jour 
        $visite->setcreated_at($date);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][0] = $response_visi->fetch();
        //Count du nombre de visite du jour -1
        $visite->setcreated_at($datem1);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][1] = $response_visi->fetch();
        //Count du nombre de visite du jour -2
        $visite->setcreated_at($datem2);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][2] = $response_visi->fetch();
        //Count du nombre de visite du jour -3
        $visite->setcreated_at($datem3);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][3] = $response_visi->fetch();
        //Count du nombre de visite du jour -4
        $visite->setcreated_at($datem4);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][4] = $response_visi->fetch();
        //Count du nombre de visite du jour -5
        $visite->setcreated_at($datem5);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][5] = $response_visi->fetch();


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

        //Count du nombre de partie du jour




        echo json_encode($stats);
        exit;


    }

    public function saveAction($params){}

}

 ?>