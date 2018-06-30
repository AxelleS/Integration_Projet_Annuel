<?php

class OrganizationController {

	public function indexAction($params) {
        $donnees_pages = array();
        array_push($donnees_pages, "Homepage");
        $roomList = new Room();
        $response_roomList = $roomList->select();
        while($donnees_roomList = $response_roomList->fetch()){
            array_push($donnees_pages, $donnees_roomList['name']);
        }
        array_push($donnees_pages, "Foire à questions");
        array_push($donnees_pages, "Nouvelle page");
        $v = new View('organization', 'back');
        $v->assign('donnees', $donnees_pages);
    }

    public function editAction($params){

        //$typeRoom = $params['URL'][0];
        //$roomList = new $typeRoom();

        if($params['URL'][0] == "Homepage") {
            $roomList = new Room();
            $response_roomList = $roomList->select();

            $homepageConfig = new Homepage();
            $response_homepageConfig = $homepageConfig->select();
            
            $roomListDetails = array();
            foreach($response_roomList->fetchAll() as $keyRoom=>$content) {
              $temp2 = array();
              foreach($content as $key=>$value) {
                if(!is_numeric($key)) {
                  if ($key == "id" || $key == "name") {
                    $temp2[$key] = $value;
                  }
                }
              }
              $roomListDetails[] = $temp2;
            }

            $homepage = array();
            while($donnees_roomValue = $response_homepageConfig->fetch()){
                
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
            $homepageConfig->setRoomlist($roomListDetails);
            $config = $homepageConfig->formModifyHomepage();
            

            $v = new View('modifyHomePage', 'back');
            $v->assign('configModifyHomepage', $config);
        } else if($params['URL'][0] == "Foire à questions") {
            
            $faq = new Faq();

            $result = $faq->select();

            $lastId = 0;
            $array = [];
            while ($response = $result->fetch()){
                $array[$response['id']] = [
                    'question' => $response['question'],
                    'answer' => $response['answer']
                ];
                $lastId = $response['id'];
            }

            $v = new View('modifyFaq', 'back');
            $v->assign("faqList",$array);
            $v->assign("lastId",$lastId);
        } else if($params['URL'][0] == "Nouvelle page") {
            $room = new Room();
            $room->setName("Nom de la Room");
            $room->setDescription("Description de la Room");
            $room->setUrlVideo("url vidéo de la room");
            $room->setCapacity(5);
            $room->setIsPregnant(0);
            $room->setIsWheelchair(0);
            $room->setIsDeaf(0);


            $config = $room->formCreateRoom();

            $v = new View('modifyRoom', 'back');
            $v->assign('roomDetails', $config);

        } else {
            $room = new Room();
            $room->setName($params['URL'][0]);

            $result = $room->select('name');
            $array = $result->fetch();

            $room->setId($array['id']);
            $room->setName($array['name']);
            $room->setDescription($array['description']);
            $room->setUrlVideo($array['url_video']);
            $room->setCapacity($array['capacity']);
            $room->setIsPregnant($array['is_pregnant']);
            $room->setIsWheelchair($array['is_wheelchair']);
            $room->setIsDeaf($array['is_deaf']);

            $config = $room->formModifyRoom();

            $v = new View('modifyRoom', 'back');
            $v->assign('roomDetails', $config);
            

        }

        $v->assign('actualPageType', $params['URL'][0]);
        
    }

    public function deleteAction($params){
	    print_r($params);
        if ($params['URL'][0] === "room") {
            $idRoom = $params['URL'][1];
            $delRoom = new Room();
            $delRoom->setId($idRoom);
            $response = $delRoom->delete('id');
            header("Location: ".DIRNAME.Route::getSlug('organization','index'));
        } else {
            $idFaq = $params['POST']['idFaq'];
            $questionAnswer = new Faq();
            $questionAnswer->setId($idFaq);
            $response = $questionAnswer->delete('id');
            echo $response;
            exit;
        }
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

            $modifyHomepage->save();
            header("Location: ".DIRNAME.Route::getSlug('organization','index'));
        } else if($params['POST']['actualPageType'] == "Foire à questions") {
            
            unset($params['POST']['actualPageType']);
            print_r($params);
            foreach($params['POST'] as $key => $value) {
                $sendFaq = new Faq();
                $sendFaq->setId($key);
                $response = $sendFaq->select('id');

                if($response->rowCount() > 0) {
                    $sendFaq->setQuestion($value['question']);
                    $sendFaq->setAnswer($value['answer']);
                } else {
                    $sendFaq->setId(null);
                    $sendFaq->setQuestion($value['question']);
                    $sendFaq->setAnswer($value['answer']);
                }
                $sendFaq->save();
            }

            header("Location: ".DIRNAME.Route::getSlug('organization','index'));
            
        } else if($params['POST']['actualPageType'] == "Nouvelle page") {
            unset($params['POST']['actualPageType']);
            $room = new Room();
            $room->setName($params['POST']['name']);
            $room->setDescription($params['POST']['description']);
            $room->setUrlVideo($params['POST']['url_video']);
            $room->setCapacity($params['POST']['capacity']);
            $room->setIsPregnant($params['POST']['is_pregnant']);
            $room->setIsWheelchair($params['POST']['is_wheelchair']);
            $room->setIsDeaf($params['POST']['is_deaf']);
            $room->save();

            $responseRoom = $room->select('name');
            $donneesRoom = $responseRoom->fetch();

            header("Location: ".DIRNAME.Route::getSlug('calendar','insertNewSlot').'/'.$donneesRoom['id']);
        } else {
            unset($params['POST']['actualPageType']);
            $room = new Room();
            $room->setName($params['POST']['name']);
            $room->setId($params['POST']['id']);
            $room->setDescription($params['POST']['description']);
            $room->setUrlVideo($params['POST']['url_video']);
            $room->setCapacity($params['POST']['capacity']);
            $room->setIsPregnant($params['POST']['is_pregnant']);
            $room->setIsWheelchair($params['POST']['is_wheelchair']);
            $room->setIsDeaf($params['POST']['is_deaf']);
            $room->save();

            header("Location: ".DIRNAME.Route::getSlug('organization','index'));
        }
       
    }

}

 ?>
