<?php

class ParametersController
{
    public function indexAction($params)
    {
        $footer = new Footer();
        $footer->setId(1);
        $response_footer = $footer->select('id');
        $donnee_footer = $response_footer->fetch();

        $homepage = new Homepage();
        $homepage->setId(1);
        $response_homepage = $homepage->select('id');
        $donnees_homepage = $response_homepage->fetch();
        $donnee_footer['logo'] = $donnees_homepage['logo'];

        $v = new View('parameters','back');
        $v->assign("donnees",$donnee_footer);

    }

    public function saveAction($params)
    {
        $infoParameters = $params['POST'];

        $modifyHomepage = new Homepage();

        $modifyFooter = new Footer();

        $error = Validate::checkForm($infoParameters);

        if (isset($_FILES) && count($_FILES) > 0) {
            foreach ($_FILES as $key => $value) {
                if($key == 'logo') {
                    $varReturn = Files::uploadPicture($value);
                } else {
                    $varReturn = Files::uploadDoc($value);
                }
                if (!is_array($varReturn)) {
                    switch ($key) {
                        case 'url_legal_mention':
                            $modifyFooter->setUrlLegalMention($varReturn);
                            break;
                        case 'CGV':
                            $modifyFooter->setUrlCGV($varReturn);
                            break;
                        case 'CGU':
                            $modifyFooter->setUrlCGU($varReturn);
                            break;
                        case 'logo':
                            $modifyHomepage->setLogo($varReturn);
                            break;
                    }
                } else {
                    switch ($key) {
                        case 'url_legal_mention':
                            if ($infoParameters['old_url_legal_mention'] != '') {
                                $modifyFooter->setUrlLegalMention($infoParameters['old_url_legal_mention']);
                            } else {
                                $error['legal_mention'] = 'PDF des mentions légales obligatoire';
                            }
                            break;
                        case 'CGV':
                            if ($infoParameters['old_CGV'] != '') {
                                $modifyFooter->setUrlCGV($infoParameters['old_CGV']);
                            } else {
                                $error['CGV'] = 'PDF des CGV obligatoire';
                            }
                            break;
                        case 'CGU':
                            if ($infoParameters['old_CGU'] != '') {
                                $modifyFooter->setUrlCGU($infoParameters['old_CGU']);
                            } else {
                                $error['CGU'] = 'PDF des CGU obligatoire';
                            }
                            break;
                        case 'logo':
                            if ($infoParameters['old_logo'] != '') {
                                $modifyHomepage->setLogo($infoParameters['old_logo']);
                            } else {
                                $error['logo'] = 'Logo du site obligatoire';
                            }
                            break;
                    }

                }
            }
        }

        $response = $modifyHomepage->select();
        $donnees_homepage = $response->fetch();

        if (!isset($error) || count($error) <= 0) {
            $modifyHomepage->setId($donnees_homepage['id']);
            $modifyHomepage->setIdRoom1($donnees_homepage['id_room_1']);
            $modifyHomepage->setIdRoom2($donnees_homepage['id_room_2']);
            $modifyHomepage->setIdRoom3($donnees_homepage['id_room_3']);
            $modifyHomepage->setTitleIntroduction($donnees_homepage['title_introduction']);
            $modifyHomepage->setDescriptionIntroduction($donnees_homepage['description_introduction']);
            $modifyHomepage->setUrlVideo('@todo');
            $modifyHomepage->setNameCompany($donnees_homepage['name_company']);
            $modifyHomepage->setEmailCompany($donnees_homepage['email_company']);
            $modifyHomepage->setAddressCompany($donnees_homepage['address_company']);
            $modifyHomepage->setZipcodeCompany($donnees_homepage['zipcode_company']);
            $modifyHomepage->setCityCompany($donnees_homepage['city_company']);
            $modifyHomepage->save();

            $response = $modifyFooter->select();
            $donnee_footer = $response->fetch();
            $modifyFooter->setId($donnee_footer['id']);
            $modifyFooter->setUrlFacebook($infoParameters['url_facebook']);
            $modifyFooter->setUrlTwitter($infoParameters['url_twitter']);
            $modifyFooter->setUrlYoutube($infoParameters['url_youtube']);
            $modifyFooter->save();

            header("Location: ".DIRNAME.Route::getSlug('parameters','index'));
        } else {
            $donnee_footer['url_facebook'] = $infoParameters['url_facebook'];
            $donnee_footer['url_twitter'] = $infoParameters['url_twitter'];
            $donnee_footer['url_youtube'] = $infoParameters['url_youtube'];
            $donnee_footer['url_CGV'] = $infoParameters['old_CGV'];
            $donnee_footer['url_CGU'] = $infoParameters['old_CGU'];
            $donnee_footer['url_legal_mention'] = $infoParameters['old_url_legal_mention'];
            $donnee_footer['logo'] = $infoParameters['old_logo'];

            $v = new View('parameters','back');
            $v->assign("donnees",$donnee_footer);
            $v->assign("error",$error);
        }
    }
}
