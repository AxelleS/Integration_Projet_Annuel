<?php

class OrganizationController {

	public function indexAction($params)
    {
        // $roomList = new Homepage();
        // $response_roomList = $roomList->select();
        // $donnees_roomList = $response_roomList->fetch();
        // echo '<pre>';
        // print_r($donnees_roomList['name']);
        // echo '</pre>';
        // die;
        // $v = new View('organization', 'back');

        $homeList = new Homepage();
        $response_homeList = $homeList->select();
        $donnees_homeList = $response_homeList->fetch();
        $donnees_homeList['name'] = "Homepage";
        $donnees_pages = array();
        array_push($donnees_pages, $donnees_homeList);

        $roomList = new Room();
        $response_roomList = $roomList->select();

        while($donnees_roomList = $response_roomList->fetch()){
            array_push($donnees_pages, $donnees_roomList);
        }

        $faqList = new Faq();
        $response_faqList = $faqList->select();
        $donnees_faqList = $response_faqList->fetch();
        $donnees_faqList['name'] = "Foire à questions";
        array_push($donnees_pages, $donnees_faqList);

        $newRoom = new Room();
        $response_newRoom = $newRoom->select();
        $donnees_newRoom = $response_newRoom->fetch();
        $donnees_newRoom['name'] = "Nouvelle page";
        array_push($donnees_pages, $donnees_newRoom);
        $v = new View('organization', 'back');
        $v->assign('roomList', $donnees_pages);


    }

    public function editAction($params){

        //$typeRoom = $params['URL'][0];
        //$roomList = new $typeRoom();

        if($params['URL'][0] == "Homepage") {
            $roomList = new Room();
            $response_roomList = $roomList->select();
            $homepage= array();
            while($donnees_roomList = $response_roomList->fetch()){
                array_push($homepage, $donnees_roomList);
            }
            $v = new View('modifyHomePage', 'back');
            $v->assign('roomSelect', $homepage);
        } else if($params['URL'][0] == "Foire à questions") {
            echo '<pre>';
            echo "FAQ";
            print_r($params);
            echo '</pre>';
        } else if($params['URL'][0] == "Nouvelle page") {
            echo '<pre>';
            echo "Nouvelle Page";
            print_r($params);
            
            echo '</pre>';
        } 
        else {
            echo '<pre>';
            echo "Room";
            print_r($params);
            echo '</pre>';
        }

        $v->assign('actualPageType', $params['URL'][0]);
        
    }

    public function deleteAction($params){
    }

    public function saveAction($params){

        if($params['POST']['actualPageType'] == "Homepage") {
            $params['POST']['id'] = "1";
            $modifyHomepage = new Homepage();
            $modifyHomepage->setId($params['POST']['id']);
            $modifyHomepage->setIdRoom1($params['POST']['id_room_1']);
            $modifyHomepage->setIdRoom2($params['POST']['id_room_2']);
            $modifyHomepage->setIdRoom3($params['POST']['id_room_3']);
            $modifyHomepage->setTitleIntroduction($params['POST']['titre_introduction']);
            $modifyHomepage->setDescriptionIntroduction($params['POST']['description_introduction']);
            $modifyHomepage->setUrlVideo($params['POST']['url_video']);
            $modifyHomepage->setNameCompany($params['POST']['name_company']);
            $modifyHomepage->setAddressCompany($params['POST']['address_company']);
            $modifyHomepage->setZipcodeCompany($params['POST']['zipcode_company']);
            $modifyHomepage->setCityCompany($params['POST']['city_company']);
            $modifyHomepage->setUrlGoogle($params['POST']['url_maps']);

            $modifyHomepage->save();
            header("Location: ".DIRNAME.Route::getSlug('organization','index'));
        } else if($params['POST']['actualPageType'] == "Foire à questions") {
            echo '<pre>';
            print_r($params);
            echo '</pre>';
            die;
        } else if($params['POST']['actualPageType'] == "Nouvelle page") {
            echo '<pre>';
            print_r($params);
            echo '</pre>';
            die;
        } else {
            echo '<pre>';
            print_r($params);
            echo '</pre>';
            die;
        }

        

        

       
    }

}

 ?>
