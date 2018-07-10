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
            $config = $homepageConfig->formModifyHomepage([]);
            

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
            $room->setPrice(0);


            $config = $room->formCreateRoom();

            $v = new View('modifyRoom', 'back');
            $v->assign('roomDetails', $config);

        } else {
            $room = new Room();
            $room->setName($params['URL'][0]);

            $result = $room->select('name');
            $donneesRoom = $result->fetch();

            $room->setId($donneesRoom['id']);
            $room->setName($donneesRoom['name']);
            $room->setDescription($donneesRoom['description']);
            $room->setUrlVideo($donneesRoom['url_video']);
            $room->setCapacity($donneesRoom['capacity']);
            $room->setIsPregnant($donneesRoom['is_pregnant']);
            $room->setIsWheelchair($donneesRoom['is_wheelchair']);
            $room->setIsDeaf($donneesRoom['is_deaf']);
            $room->setPrice($donneesRoom['price']);

            $pictures = new Picture();
            $pictures->setIdRoom($donneesRoom['id']);
            $result = $pictures->select('id_room');
            $picturesArray = [];
            $keyPicture = '';
            while ($donneesPictures = $result->fetch()) {
                $picturesArray[] = $donneesPictures['url_picture'];
            }

            $config = $room->formModifyRoom([], $picturesArray);

            $v = new View('modifyRoom', 'back');
            $v->assign('roomDetails', $config);
            $v->assign('keyPicture', $keyPicture);
        }

        $v->assign('actualPageType', $params['URL'][0]);
        
    }

    public function deleteAction($params){
	    print_r($params);die;
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
        $infoOrganization = $params['POST'];

        if($infoOrganization['actualPageType'] == "Homepage") {

            $modifyHomepage = new Homepage();

            $errors = Validate::checkForm($infoOrganization);

            if(count($errors) > 0) {
                $modifyHomepage->setId(1);
                $modifyHomepage->setIdRoom1($infoOrganization['id_room_1']);
                $modifyHomepage->setIdRoom2($infoOrganization['id_room_2']);
                $modifyHomepage->setIdRoom3($infoOrganization['id_room_3']);
                $modifyHomepage->setTitleIntroduction($infoOrganization['title_introduction']);
                $modifyHomepage->setDescriptionIntroduction($infoOrganization['description_introduction']);
                $modifyHomepage->setUrlVideo($infoOrganization['url_video']);
                $modifyHomepage->setNameCompany($infoOrganization['name_company']);
                $modifyHomepage->setAddressCompany($infoOrganization['address_company']);
                $modifyHomepage->setZipcodeCompany($infoOrganization['zipcode_company']);
                $modifyHomepage->setCityCompany($infoOrganization['city_company']);

                $roomList = new Room();
                $response_roomList = $roomList->select();

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

                $modifyHomepage->setRoomlist($roomListDetails);
                $config = $modifyHomepage->formModifyHomepage($errors);
                $v = new View('modifyHomePage', 'back');
                $v->assign('configModifyHomepage', $config);
            }
            else {
                if (isset($_FILES) && count($_FILES) > 0) {
                    $varsReturn = Files::uploadMultiplePicture($_FILES['images'], 6);
                    if (count($varsReturn) > 0) {
                        if (substr($varsReturn[0], 0, 6) == 'files/') {
                            $i = 1;
                            foreach ($varsReturn as $varReturn) {
                                $picture = new Picture();
                                $picture->setIdRoom(null);
                                $picture->setUrlPicture($varReturn);
                                $picture->setOrderPicture($i);
                                $picture->setIsMain(0);
                                $picture->save();
                                $i++;
                            }
                        }
                    }
                }
                $response_homepageConfig = $modifyHomepage->select();
                $donneesHomepage = $response_homepageConfig->fetch();
                $modifyHomepage->setId(1);
                $modifyHomepage->setIdRoom1($infoOrganization['id_room_1']);
                $modifyHomepage->setIdRoom2($infoOrganization['id_room_2']);
                $modifyHomepage->setIdRoom3($infoOrganization['id_room_3']);
                $modifyHomepage->setTitleIntroduction($infoOrganization['title_introduction']);
                $modifyHomepage->setDescriptionIntroduction($infoOrganization['description_introduction']);
                $modifyHomepage->setUrlVideo($infoOrganization['url_video']);
                $modifyHomepage->setNameCompany($infoOrganization['name_company']);
                $modifyHomepage->setAddressCompany($infoOrganization['address_company']);
                $modifyHomepage->setZipcodeCompany($infoOrganization['zipcode_company']);
                $modifyHomepage->setCityCompany($infoOrganization['city_company']);
                $modifyHomepage->setLogo($donneesHomepage['logo']);

                $modifyHomepage->save();

                header("Location: ".DIRNAME.Route::getSlug('organization','index'));
            }
        } else if($infoOrganization['actualPageType'] == "Foire à questions") {
            
            unset($infoOrganization['actualPageType']);
            foreach($infoOrganization as $key => $value) {
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
            
        } else if($infoOrganization['actualPageType'] == "Nouvelle page") {
            unset($infoOrganization['actualPageType']);
            $room = new Room();
            $room->setName($infoOrganization['name']);
            $room->setDescription($infoOrganization['description']);
            $room->setUrlVideo($infoOrganization['url_video']);
            $room->setCapacity($infoOrganization['capacity']);
            $room->setIsPregnant($infoOrganization['is_pregnant']);
            $room->setIsWheelchair($infoOrganization['is_wheelchair']);
            $room->setIsDeaf($infoOrganization['is_deaf']);
            $room->setPrice($infoOrganization['price']);
            $room->save();

            $responseRoom = $room->select('name');
            $donneesRoom = $responseRoom->fetch();

            header("Location: ".DIRNAME.Route::getSlug('calendar','insertNewSlot').'/'.$donneesRoom['id']);
        } else {
            unset($infoOrganization['actualPageType']);
            $errors = Validate::checkForm($infoOrganization);

            if (isset($_FILES) && count($_FILES) > 0) {
                foreach ($_FILES as $key=>$value) {
                    if($value['error'] == 0) {
                        $varReturn = Files::uploadPicture($value);
                        if(!is_array($varReturn)) {
                            $picture = new Picture();
                            $picture->setIdRoom($infoOrganization['id']);
                            $picture->setOrderPicture($key);
                            $response = $picture->select(['id_room', 'order_picture']);

                            if($response->rowCount() > 0) {
                                $donneesPicture = $response->fetch();
                                $picture->setId($donneesPicture['id']);
                            } else {
                                $picture->setOrderPicture($key);
                            }

                            if($key == 1) {
                                $picture->setIsMain(1);
                            } else {
                                $picture->setIsMain(0);
                            }

                            $picture->setUrlPicture($varReturn);

                            $picture->save();
                        }
                    }
                }
            }

            $room = new Room();
            $room->setName($infoOrganization['name']);
            $room->setId($infoOrganization['id']);
            $room->setDescription($infoOrganization['description']);
            $room->setUrlVideo($infoOrganization['url_video']);
            $room->setCapacity($infoOrganization['capacity']);
            $room->setIsPregnant($infoOrganization['is_pregnant']);
            $room->setIsWheelchair($infoOrganization['is_wheelchair']);
            $room->setIsDeaf($infoOrganization['is_deaf']);
            $room->setPrice($infoOrganization['price']);

            if(count($errors) > 0) {
                $config = $room->formModifyRoom($errors);

                $v = new View('modifyRoom', 'back');
                $v->assign('roomDetails', $config);

            } else {
                $room->save();

                header("Location: ".DIRNAME.Route::getSlug('organization','index'));
            }
        }
       
    }

}

 ?>
