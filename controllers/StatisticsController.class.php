<?php 

class StatisticsController {

	public function indexAction($params)
    {
        $activate_stats = new Display_stats();
        $response_activate = $activate_stats->select();
        while($donnees = $response_activate->fetch()){
            $donnees_stats[$donnees['name']] = $donnees['activate'];
        }

        $v = new View('statistics','back');
        $v->assign("donnees",$donnees_stats);
    }

    public function ajaxStatisticsAction($params){
        
        //Récupération de la date du jour 
        $date = date('Y-m-d').'%';
        $datem1 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-1, date('Y'))).'%';
        $datem2 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-2, date('Y'))).'%';
        $datem3 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-3, date('Y'))).'%';
        $datem4 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-4, date('Y'))).'%';
        $datem5 = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')-5, date('Y'))).'%';

        //Count du nombre de visite du jour
        $visite = new Statistic();
        for ($i=0; $i<10; $i++) { 
            $dateHeure = date('Y-m-d').' 0'.$i.'%';

            $visite->setCreatedAt($dateHeure);
            $response_visi = $visite->count('created_at');
            $stats['number_visite_today'][$i] = $response_visi->fetch();
        }

        for ($i=10; $i <24 ; $i++) { 
            $dateHeure = date('Y-m-d').' '.$i.'%';

            $visite->setCreatedAt($dateHeure);
            $response_visi = $visite->count('created_at');
            $stats['number_visite_today'][$i] = $response_visi->fetch();
        }
        

        //Count du nombre de visite  
        $visite->setCreatedAt($date);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][0] = $response_visi->fetch();
        //Count du nombre de visite du jour -1
        $visite->setCreatedAt($datem1);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][1] = $response_visi->fetch();
        //Count du nombre de visite du jour -2
        $visite->setCreatedAt($datem2);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][2] = $response_visi->fetch();
        //Count du nombre de visite du jour -3
        $visite->setCreatedAt($datem3);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][3] = $response_visi->fetch();
        //Count du nombre de visite du jour -4
        $visite->setCreatedAt($datem4);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][4] = $response_visi->fetch();
        //Count du nombre de visite du jour -5
        $visite->setCreatedAt($datem5);
        $response_visi = $visite->count('created_at');
        $stats['number_visite'][5] = $response_visi->fetch();


        //Count du nombre de nouveau utilisateur
        $users = new User();
        $users->setDateInserted($date);
        $response_stat = $users->count('date_inserted');
        $stats['number_insert_today'][0] = $response_stat->fetch();
        //Count du nombre de nouveau utilisateur ce jour -1
        $users->setDateInserted($datem1);
        $response_stat = $users->count('date_inserted');
        $stats['number_insert_today'][1] = $response_stat->fetch();
        //Count du nombre de nouveau utilisateur ce jour -2
        $users->setDateInserted($datem2);
        $response_stat = $users->count('date_inserted');
        $stats['number_insert_today'][2] = $response_stat->fetch();
        //Count du nombre de nouveau utilisateur ce jour -3
        $users->setDateInserted($datem3);
        $response_stat = $users->count('date_inserted');
        $stats['number_insert_today'][3] = $response_stat->fetch();
        //Count du nombre de nouveau utilisateur ce jour -4
        $users->setDateInserted($datem4);
        $response_stat = $users->count('date_inserted');
        $stats['number_insert_today'][4] = $response_stat->fetch();
        //Count du nombre de nouveau utilisateur ce jour -5
        $users->setDateInserted($datem5);
        $response_stat = $users->count('date_inserted');
        $stats['number_insert_today'][5] = $response_stat->fetch();


        
        //Count du nombre de reservation 
        $resa = new Time_slot();
        $resa->setDateBill($date);
        $response_resa = $resa->count('date_bill');
        $stats['number_resa_today'][0] = $response_resa->fetch();
        //Count du nombre de reservation ce jour -1
        $resa->setDateBill($datem1);
        $response_resa = $resa->count('date_bill');
        $stats['number_resa_today'][1] = $response_resa->fetch();
        //Count du nombre de reservation ce jour -2 
        $resa->setDateBill($datem2);
        $response_resa = $resa->count('date_bill');
        $stats['number_resa_today'][2] = $response_resa->fetch();
        //Count du nombre de reservation ce jour -3
        $resa->setDateBill($datem3);
        $response_resa = $resa->count('date_bill');
        $stats['number_resa_today'][3] = $response_resa->fetch();
        //Count du nombre de reservation ce jour -4
        $resa->setDateBill($datem4);
        $response_resa = $resa->count('date_bill');
        $stats['number_resa_today'][4] = $response_resa->fetch();
        //Count du nombre de reservation ce jour -5
        $resa->setDateBill($datem5);
        $response_resa = $resa->count('date_bill');
        $stats['number_resa_today'][5] = $response_resa->fetch();

        //Count du nombre de partie du jour

        //Envoi des données au success de la requête ajax
        echo json_encode($stats);
        exit;


    }

    public function saveAction($params){ 
        $stats['visites'] = $params['GET']['visites'];
        $stats['visite_jour'] = $params['GET']['visite_jour'];
        $stats['inscrit_jour'] = $params['GET']['inscrit_jour'];
        $stats['reservation_jour'] = $params['GET']['reservation_jour'];
        $stats['parti_jour'] = $params['GET']['parti_jour'];

        foreach ($stats as $key=>$value) {
            $activate_stats = new Display_stats();
            $activate_stats->setName($key);
            $donnees_stats = $activate_stats->select('name')->fetch();
            $activate_stats->setId($donnees_stats['id']);
            $activate_stats->setActivate($value);
            $activate_stats->save();
        }
    }
         
    
}

 ?>