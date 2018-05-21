<?php

class OrganizationController {

	public function indexAction($params) {
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
            $roomName = array();
            $homepageConfig = new Homepage();
            $response_roomValue = $homepageConfig->select();
            $homepage = array();
            
            $roomListDetails = array();
            forEach($response_roomList->fetchAll() as $keyRoom=>$content) {
              $temp2 = array();
              forEach($content as $key=>$value) {
                if(!is_numeric($key)) {
                  if ($key == "id" || $key == "name") {
                    $temp2[$key] = $value;
                  }
                }
              }
              $roomListDetails[] = $temp2;
            }

            while($donnees_roomValue = $response_roomValue->fetch()){
              array_push($homepage, $donnees_roomValue);
            }

            $homepageConfig->setId(1);
            $homepageConfig->setIdRoom1($homepage[0]['id_room_1']);
            $homepageConfig->setIdRoom2($homepage[0]['id_room_2']);
            $homepageConfig->setIdRoom3($homepage[0]['id_room_3']);
            $homepageConfig->setTitleIntroduction($homepage[0]['title_introduction']);
            $homepageConfig->setDescriptionIntroduction($homepage[0]['description_introduction']);
            $homepageConfig->setUrlVideo($homepage[0]['url_video']);
            $homepageConfig->setNameCompany($homepage[0]['name_company']);
            $homepageConfig->setAddressCompany($homepage[0]['address_company']);
            $homepageConfig->setZipcodeCompany($homepage[0]['zipcode_company']);
            $homepageConfig->setCityCompany($homepage[0]['city_company']);
            $homepageConfig->setUrlGoogle($homepage[0]['url_google']);
            $homepageConfig->setRoomlist($roomListDetails);
            $config = $homepageConfig->formModifyHomepage();

            $v = new View('modifyHomePage', 'back');
            $v->assign('roomSelect', $homepage);
            $v->assign('configModifyHomepage', $config);
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
        } else {
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
        // echo '<pre>';
        //     print_r($params);
        //     echo '</pre>';
        //     die;

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
            $modifyHomepage->setUrlGoogle($params['POST']['url_google']);

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
