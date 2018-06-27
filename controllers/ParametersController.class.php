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
        $donnee_footer['unit_price'] = $donnees_homepage['unit_price'];

        $v = new View('parameters','back');
        $v->assign("donnees",$donnee_footer);

    }

    public function saveAction($params)
    {
        $params['POST']['id'] = "1";
        $modifyHomepage = new Homepage();
        $modifyHomepage->setId($params['POST']['id']);
        $response = $modifyHomepage->select('id');
        $donnees = $response->fetch();
        $modifyHomepage->setIdRoom1($donnees['id_room_1']);
        $modifyHomepage->setIdRoom2($donnees['id_room_2']);
        $modifyHomepage->setIdRoom3($donnees['id_room_3']);
        $modifyHomepage->setTitleIntroduction($donnees['title_introduction']);
        $modifyHomepage->setDescriptionIntroduction($donnees['description_introduction']);
        $modifyHomepage->setUrlVideo('@todo');
        $modifyHomepage->setNameCompany($donnees['name_company']);
        $modifyHomepage->setAddressCompany($donnees['address_company']);
        $modifyHomepage->setZipcodeCompany($donnees['zipcode_company']);
        $modifyHomepage->setCityCompany($donnees['city_company']);
        $modifyHomepage->setUrlGoogle('@todo');

        $modifyHomepage->setUnitPrice($params['POST']['unit_price']);
        $modifyHomepage->save();

        $modifyFooter = new Footer();
        $modifyFooter->setId($params['POST']['id']);
        $modifyFooter->setUrlFacebook($params['POST']['url_facebook']);
        $modifyFooter->setUrlTwitter($params['POST']['url_twitter']);
        $modifyFooter->setUrlYoutube($params['POST']['url_youtube']);
        $modifyFooter->setUrlCGV($params['POST']['CGV']);
        $modifyFooter->setUrlCGU($params['POST']['CGU']);
        $modifyFooter->setUrlLegalMention($params['POST']['url_legal_mention']);
        $modifyFooter->save();
        header("Location: ".DIRNAME.Route::getSlug('parameters','index'));

        /*echo '<pre>';
            print_r($params);
            echo '</pre>';
            die;
        echo "dans le save";exit;
        var_dump($params);exit;*/
    }
}